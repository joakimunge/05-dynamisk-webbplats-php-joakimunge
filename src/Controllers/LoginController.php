<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class LoginController extends AbstractController {

    public function login() {
        $this->render('login');
        $db = new Database();
    }

}

?>