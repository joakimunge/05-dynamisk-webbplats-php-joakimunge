<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class SignupController extends AbstractController {

    public function register() {
        $db = new Database();

        //Get session parameters from POST
        var_dump($_POST);
        $_SESSION['first_name'] = $_POST['firstname'];
        $_SESSION['last_name'] = $_POST['lastname'];
        $_SESSION['email'] = $_POST['email'];
        
        //Escape $_POST vars to protect agains injections.
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $hash = md5(rand(0,1000));

        $userExists = $db->query('SELECT * FROM users WHERE email = ?', [$email]);

        var_dump($userExists);
    }

    public function signup() {
        $this->render('register');
    }

}

?>