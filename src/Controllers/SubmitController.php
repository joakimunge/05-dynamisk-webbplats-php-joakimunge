<?php
namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;



class SubmitController extends AbstractController {

    public function submit()
    {

        $targetSubstr = '/assets/img/default_thumb.jpg';

        if ($_FILES['image']['name'] != '') {

            $target = '/vagrant/src/images/';
            $suffix = explode('.', $_FILES['image']['name']);
            $filename = uniqid('image');
            $target = $target.basename($filename . '.' . $suffix[1]);
            $targetSubstr = strstr($target, '/src');

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "The file " . basename($_FILES['image']['name']) . " has been uploaded, and your information has been added to the directory";
            } else {
                echo "Sorry, there was a problem uploading your file.";
            } 

        }
        $db = new Database();
        $post = $db->query('INSERT INTO `entries` SET title=?, author=?, content=?, image=?, date=NOW()', [
            $this->request->getPostValue('title'),
            $this->request->getPostValue('author'),
            $this->request->getPostValue('content'),
            $targetSubstr
        ]);;

        var_dump($post);

        
              
        // header("Location: /post?id=" . $db->lastInsertId());
        header("Location: /");        
        die();
    }

}

?>