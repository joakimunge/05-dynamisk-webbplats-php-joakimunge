<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class LoginController extends AbstractController {

    public function login() {
        $this->render('login');
    }

    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('/');
    }

    public function submitLogin() {
        $db = new Database();
        $email = $_POST['email'];
        $user = $db->readOne('SELECT * FROM users WHERE email = ?', [$email]);

        if ($user === false) {
            $_SESSION['message'] = 'Couldn\'nt find any user with that E-mail :(';
            echo $_SESSION['message'];
            // $this->redirect('/login');
        }
        else {
            
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['admin'] = $user['admin'];
                $_SESSION['loggedin'] = true;

                $this->redirect('/');
            }
            else {
                $_SESSION['message'] = 'Wrong password!';
            }

        }

    }

}

?>