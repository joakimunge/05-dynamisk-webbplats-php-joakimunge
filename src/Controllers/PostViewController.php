<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Models\Blogpost;

class PostViewController extends AbstractController
{

    public function postView()
    {
        $db = new Database();
        $id = $this->request->getQueryString('id');
        $entry = $db->query('SELECT * FROM entries WHERE id = ? LIMIT 1', [$id]);
        
        $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);

        $this->render('post', $post);
    }

}

?>