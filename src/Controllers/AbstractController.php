<?php 

namespace Blog\Controllers;

abstract class AbstractController {

    protected $request;

    public function __construct($request) {
        $this->request = $request;
    }

    protected function render(string $template, array $params = []) 
    {
        extract($params);

        ob_start();
        include __DIR__ . '/../Views/_header.php';
        include __DIR__ . '/../Views/' . $template . '.php';
        include __DIR__ . '/../Views/_footer.php';
        $renderedView = ob_get_clean();

        echo $renderedView;
    }
}

?>