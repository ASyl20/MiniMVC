<?php

class PageController extends Controller{

  function __construct($data = array()){
    parent::__construct($data);
  }

  public function index(){
    $this->data['test']= "salut";
  //  echo 'Je suis la methode index';
  //  var_dump($this->getParams());
  }

}

?>
