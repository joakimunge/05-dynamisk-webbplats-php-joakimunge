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

        if (strlen($this->request->getPostValue('title')) <= 0
        || strlen($this->request->getPostValue('content')) <= 0) {
            echo 'Error';
            $this->redirect('/add');
        } 
        
        try {

            $db = new Database();

            $db->dbconnection->beginTransaction();
            
            $post = $db->query('INSERT INTO entries SET title=?, author=?, author_id=?, content=?, image=?, date=NOW(), tags = ?', [
                $this->request->getPostValue('title'),
                $_SESSION['first_name'],
                $_SESSION['id'],
                $this->request->getPostValue('content'),
                $imagePath,
                $this->request->getPostValue('tag')
            ]);

            $bridge = $db->query('INSERT INTO entry_tag SET entry_id = LAST_INSERT_ID(), tag_id = ?', [
                $this->request->getPostValue('tag')
            ]);

            $db->dbconnection->commit();

        } catch(Exception $e) {
            echo 'meep';
        }
        $lastId = $db->getLastInserted('id', 'entries');
        $this->redirect('/post?id=' . $lastId);        
    }

}

?>