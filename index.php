<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Blog\Core\Router;
use Blog\Core\Request;

function autoloader($classname) {
    var_dump($classname);
    $lastSlash = strpos($classname, '\\') + 1;
    var_dump($lastSlash);
    $classname = substr($classname, $lastSlash);
    var_dump($classname);
    $directory = str_replace('\\', '/',  $classname);
    var_dump($directory);    
    $filename = __DIR__ . '/src/' . $directory . '.php';
    var_dump($filename); 
    require_once($filename);
}

spl_autoload_register('autoloader');


/* var_dump($_SERVER);
var_dump($_SERVER['REQUEST_URI']);
var_dump(parse_url($_SERVER['REQUEST_URI'])); */

$request = new Request();
$router = new Router($request);

$router->get('/', 'IndexController', 'index');

$router->dispatch();

?>