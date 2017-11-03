<?php 

namespace Blog\Controllers;

class LoginController extends AbstractController {

    public function login() {
        var_dump('Herro, LoginController served me!');
        $this->render('login.php');
        $db = new Database();
    }

}

?>