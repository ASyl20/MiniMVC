<?php

class Router{

  protected $uri;
  // On va extraire les valeurs de url
  protected $controller;
  protected $action;
  protected $params;



  public function getController(){
    return $this->controller;
  }
  public function getAction(){
    return $this->action;
  }
  public function getUri(){
    return $this->uri;
  }
  public function getParams(){
    return $this->params;
  }

  function __construct($uri){

    // Mettre le controller par defaut
    $this->controller = Config::get('default_controller');
    $this->action = Config::get('default_action');
    // var_dump($this->action);
    // var_dump($this->controller);

    $uri_parts = explode("?",$uri);
    $path = $uri_parts[0];

    $path_parts = explode('/',$path);
    //var_dump($path_parts);

    // On affecte les controllers
    if(count($path_parts)){
      if(current($path_parts)){
        $this->controller = strtolower(current($path_parts));
        // echo 'controller = '.$this->controller;
        // retire le premier élément du tableau
        array_shift($path_parts);
      }
      if(current($path_parts)){
        $this->action = strtolower(current($path_parts));
        //echo '<br/>action = '.$this->action;
        array_shift($path_parts);
      }
      $this->params = $path_parts;
      // var_dump($this->params);
    }
  }

}

?>
