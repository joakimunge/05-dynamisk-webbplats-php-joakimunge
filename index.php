<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

use Blog\Core\Router;
use Blog\Core\Request;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/',  $classname);    
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}

spl_autoload_register('autoloader');

/* var_dump($_SERVER);
var_dump($_SERVER['REQUEST_URI']);
var_dump(parse_url($_SERVER['REQUEST_URI'])); */

$request = new Request();
$router = new Router($request);

//Routes
$router->get('/', 'IndexController', 'index');
$router->get('/login', 'LoginController', 'login');
$router->post('/submitlogin', 'LoginController', 'submitLogin');
$router->get('/admin', 'AdminController', 'admin');
$router->get('/add', 'AddnewController', 'add');
$router->get('/post', 'PostViewController', 'postView');
$router->post('/submit', 'SubmitController', 'submit');
$router->get('/signup', 'SignupController', 'signup');
$router->post('/register', 'SignupController', 'register');
$router->dispatch();


?>