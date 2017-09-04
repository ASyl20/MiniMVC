<?php

class App{

  protected static $router;
  protected static $db;

  public static function getRouter(){
    return self::$router;
  }

  public static function run($uri){
    self::$router  = new Router($uri);
    $class = str_replace(' ','',self::$router->getController());
    // echo $class;
    $controller_class = ucfirst($class.'Controller');
    $controller_method = strtolower(self::$router->getAction());
    //  echo "Action = $controller_method";
    //  echo "<br />Controller = $controller_class <br />";
    $controller_object = new $controller_class();
    if(method_exists($controller_object,$controller_method)){
      $view_path = $controller_object->$controller_method();
      $view_object = new View($controller_object->getData(),$view_path);
      $content = $view_object->render();
    }else{
      // throw new Exception("La methode n'existe pas", 1);
      header("Location: ".Config::get("default_error")."?error=action");
    }
    $layout = Config::get('default_layout').'.html';

    $layout_path = APP.DS.'template'.DS.$layout;
    $layout_view_obj = new View(compact("content"),$layout_path);
    echo $layout_view_obj->render();
  }

}

?>
