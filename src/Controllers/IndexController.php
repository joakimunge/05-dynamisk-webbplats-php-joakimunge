<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class IndexController extends AbstractController {

    public function index() {
        var_dump('Herro, IndexController served me!');
            $this->render('frontpage');
            $db = new Database();
            var_dump($db);
    }

}

?>