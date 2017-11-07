<?php 

namespace Blog\Core;

class Request {
    
    protected $path;
    protected $requestMethod;
    protected $queryStrings = [];
    protected $postValues = [];
    protected $filesValues = [];

    public function __construct() {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $this->path = $parsedUrl['path'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];

        if (isset($parsedUrl['query'])) {
            $queryStrings = explode('&', $parsedUrl['query']);

            foreach ($queryStrings as $string) {
                $explodedString = explode('=', $string);
                $this->queryStrings[$explodedString[0]] = $explodedString[1];
            }
        }

        $this->postValues = $_POST;
        $this->filesValues = $_FILES;
    }
    
    public function getPath() {
        return $this->path;
    }

    public function getRequestMethod() {
        return $this->requestMethod;
    }

    public function getPostValue(string $key) {
        return $this->postValues[$key];
    }

    public function getQueryString(string $key) {
        return $this->queryStrings[$key];
    }

    public function getFilesValue(string $key, string $value) {
        return $this->filesValues[$key][$value];
    }

/*     public function getFilesValues()
    {
        return $this->filesValues;
    } */
}

?>