<?php
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)));
define('WEBROOT',ROOT.DS.'webroot');
define('APP',ROOT.DS.'app');
define('LIB',APP.DS.'lib');
define('CONF',APP.DS.'config');
define('MVC',APP.DS.'mvc');
define('SITE_URL','http://localhost/miniMVC/');
require_once(LIB.DS.'init.php');
require_once(CONF.DS.'config.php');
// On récupere URL
$uri = $_SERVER['REQUEST_URI'];
// On racourcis l'url
$uri = str_replace('miniMVC/','',$uri);
// On retire les '/' devant derrieres
$uri = urldecode(trim($uri,'/'));
//var_dump($uri);
//echo Config::get('site_name');
// $config = new Config();

$app  = App::run($uri);
 ?>
<!-- <h1>Je suis le webroot</h1> -->
