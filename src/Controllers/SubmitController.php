<?php
namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;



class SubmitController extends AbstractController {

    public function submit()
    {
        $db = new Database();
        $post = $db->query('INSERT INTO `entries` SET title=?, author=?, content=?, image=?, date=NOW()', [
            $this->request->getPostValue('title'),
            $this->request->getPostValue('author'),
            $this->request->getPostValue('content'),
            $this->request->getFilesValue('image', 'name')
        ]);;

        $target = '/vagrant/src/images/';
        // $target = $target.basename($_FILES['image']['name']);
        $suffix = explode('.', $_FILES['image']['name']);
        var_dump($suffix);
        $filename = uniqid('image');
        $target = $target.basename($filename . '.' . $suffix[1]);
        var_dump($target);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { 
            echo "The file " . basename($_FILES['image']['name']) . " has been uploaded, and your information has been added to the directory";
        } else { 
            echo "Sorry, there was a problem uploading your file.";
        } 
              
        // header("Location: /post?id=" . $db->lastInsertId());
        header("Location: /");        
        die();
    }

}

?>