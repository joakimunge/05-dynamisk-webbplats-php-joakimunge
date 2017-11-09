<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class SignupController extends AbstractController {

    public function register() {
        $db = new Database();

        //Get session parameters from POST
        $_SESSION['first_name'] = $_POST['firstname'];
        $_SESSION['last_name'] = $_POST['lastname'];
        $_SESSION['email'] = $_POST['email'];
        
        //Escape $_POST vars to protect agains injections.
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $hash = md5(rand(0,1000));

        // Check if users exists in db with corresp. email
        

        if (count($db->query('SELECT * FROM users WHERE email = ?', [$email])) > 0) {
            echo 'A user with that email already exists';
        } 

        else { //Email doesnt exist. Proceeed.

            $sql = 'INSERT INTO users (first_name, last_name, email, password, hash) VALUES (?, ?, ?, ?, ?)';
            if ($db->createOne($sql, [$first_name, $last_name, $email, $password, $hash])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['message'] = 'Success! Welcome!';
                $this->redirect('/');
            }
            else {
                $_SESSION['message'] = 'Registration failed. Something went wrong.';
                $this->redirect('/');
            }
            
        }
        
    }

    public function signup() {
        $this->render('register');
    }

}

?>