<?php 

namespace Blog\Core;

class Request {
    
    protected $path;
    protected $requestMethod;
    protected $queryStrings = [];
    protected $postValues = [];

    public function __construct() {
        
    }
}

?>