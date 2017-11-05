<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Views\Blogpost;

class IndexController extends AbstractController {

    public function index() {
        $db = new Database();

        $entries = $db->query('SELECT * FROM entries');
        $posts = [];
        foreach($entries as $entry) {
            $modal = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date']);
            $posts[] = $modal;
        }

        $this->render('frontpage', $posts);
    }

}

?>