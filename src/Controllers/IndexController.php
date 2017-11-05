<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class IndexController extends AbstractController {

    public function index() {
        $this->render('frontpage');
        $db = new Database();     
    }

}

?>