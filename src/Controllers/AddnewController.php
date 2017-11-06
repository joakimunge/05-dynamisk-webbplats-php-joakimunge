<?php 
namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Views\Blogpost;

class AddnewController extends AbstractController {

    public function add()
    {
        $db = new Database();
        $this->render('addnew');
    }

}

?>