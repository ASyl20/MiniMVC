<?php


/**
 *
 */
class Config
{

  // function __construct()
  // {
  //   echo "Je suis la classe config";
  // }

  protected static $setting = array();

  public static function get($key){
    return isset(self::$setting[$key]) ? self::$setting[$key] : null;
  }

  public static function set($key,$value){
    self::$setting[$key] = $value;
  }
}



 ?>
