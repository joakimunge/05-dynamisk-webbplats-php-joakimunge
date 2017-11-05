<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class AdminController extends AbstractController {

    public function admin() {
        $this->render('admin');
        $db = new Database();
    }

}

?>