<?php 

namespace Blog\Core;

class Request {
    
    protected $path;
    protected $requestMethod;
/*     protected $queryStrings = [];
    protected $postValues = []; */

    public function __construct() {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $this->path = $parsedUrl['path'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }
    
    public function getPath() {
        return $this->path;
    }

    public function getRequestMethod() {
        return $this->requestMethod;
    }
}

?>