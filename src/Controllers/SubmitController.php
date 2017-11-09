<?php
namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;

class SubmitController extends AbstractController {

    public function submit()
    {

        $imagePath = '/assets/img/default_thumb.jpg';

        if ($_FILES['image']['name'] != '') {

            $target = '/vagrant/src/images/';
            $suffix = explode('.', $_FILES['image']['name']);
            $filename = uniqid('image');
            $target = $target.basename($filename . '.' . $suffix[1]);
            $imagePath = strstr($target, '/src');

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "The file " . basename($_FILES['image']['name']) . " has been uploaded, and your information has been added to the directory";
            } else {
                echo "Sorry, there was a problem uploading your file.";
            } 

        }
        $db = new Database();

        // Temporary form validation
        if (strlen($this->request->getPostValue('title')) <= 0
        || strlen($this->request->getPostValue('author')) <= 0
        || strlen($this->request->getPostValue('content')) <= 0) {
            echo 'Error';
            $this->redirect('/add');
        } 


        $post = $db->query('INSERT INTO `entries` SET title=?, author=?, content=?, image=?, date=NOW()', [
            $this->request->getPostValue('title'),
            $this->request->getPostValue('author'),
            $this->request->getPostValue('content'),
            $imagePath
        ]);;
              
        $this->redirect('/');        
    }

}

?>