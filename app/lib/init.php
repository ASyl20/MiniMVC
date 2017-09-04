<?php

  function __autoload($class_name){
    // var_dump($class_name);
    $lib_path = LIB.DS.strtolower($class_name).'.class.php';
    $controller_path = MVC.DS.'controllers'.DS.str_replace('controller','',strtolower($class_name)).'.controller.php';

    echo "$controller_path<br />";

    if(file_exists($lib_path)){
        require_once($lib_path);
    }elseif (file_exists($controller_path)){
        require_once($controller_path);
    }
    else{
    //  throw new Exception("La classe --- $class_name --- n'existe pas",1);
     header("Location: ".Config::get("default_error"));
    }
  }

?>
