<?php 

namespace Blog\Controllers;

class AdminController extends AbstractController {

    public function admin() {
        var_dump('Herro, AdminController served me!');
        $this->render('admin.php');
        $db = new Database();
        var_dump($db);
    }

}

?>