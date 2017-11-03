<?php 

namespace Blog\Core;

class Router {

    protected $request;
    protected $routes = [];

    public function __construct($request) {
        $this->request = $request;
    }

    public function get(string $path, string $controller, string $method) {
        $this->routes[] = [$path, $controller, $method, 'GET'];
    }
    
    public function post(string $path, string $controller, string $method) {
        $this->routes[] = [$path, $controller, $method, 'POST'];
    }

    public function dispatch() {
        foreach($this->routes as $route) {
            if ($this->request->getPath() === route[0] && $this->request->getRequestMethod() === route[3]) {
                require_once(__DIR__ . '/../Controllers/' . $route[1] . '.php');
                $controller = new $route[1]($this->request);
                $controller->{$route[2]}();
            }
        }
    }

}

?>
