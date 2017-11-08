<?php 

namespace Blog\Controllers;

use Blog\Core\Request;

abstract class AbstractController {

    protected $request;

    public function __construct($request) {
        $this->request = $request;
    }

    protected function render(string $template, array $params = []) // $params = data from model. Data that we want to render
    {
        extract($params);

        ob_start();
        include __DIR__ . '/../Templates/_header.php';
        include __DIR__ . '/../Templates/' . $template . '.php';
        include __DIR__ . '/../Templates/_footer.php';
        $renderedView = ob_get_clean();

        echo $renderedView;
    }
}

?>