<?php

//Error reporting. Remove before pushing live.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

use Blog\Core\Router;
use Blog\Core\Request;
use Blog\Core\Database;
use Blog\Models\Blogpost;

//Autoload dependencies
function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/',  $classname);    
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}

spl_autoload_register('autoloader');

//Init request and router
$request = new Request();
$router = new Router($request);

//Routes - Get
$router->get('/', 'IndexController', 'index');
$router->get('/login', 'LoginController', 'login');
$router->get('/admin', 'AdminController', 'admin');
$router->get('/add', 'AddnewController', 'add');
$router->get('/post', 'PostViewController', 'postView');
$router->get('/signup', 'SignupController', 'signup');

//Routes - Post
$router->post('/submitlogin', 'LoginController', 'submitLogin');
$router->post('/submit', 'SubmitController', 'submit');
$router->post('/register', 'SignupController', 'register');
$router->get('/logout', 'LoginController', 'logout');

//Populate routes
$router->dispatch();

//Ajax
if (isset($_POST['json'])) {

    $ajaxResponse = json_decode($_POST['json'], true);
    $db = new Database();
    
    $tag = $ajaxResponse['tag_id'];
    $entries = $db->query('SELECT * FROM entry_tag JOIN entries ON entry_tag.entry_id = entries.id WHERE tag_id = ?', [$tag]);
    $posts = [];
    foreach ($entries as $entry) {
        $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);
        $posts[] = $post;
    }

    foreach ($posts as $post) {
        include ('./src/Templates/post_card.php');
    }
    
    $data = [
        'posts' => $posts
    ];

}
?>