<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Models\Blogpost;
use Blog\Models\Tag;

class IndexController extends AbstractController {

    public function index() {
        $db = new Database();
        $data = [];
        var_dump($this->request);

        $entries = $db->query('SELECT * FROM entries');
        foreach($entries as $entry) {
            $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id']);
            $posts[] = $post;
        }

        $data = [
            'posts' => $posts,
            'tags' => $this->tags()
        ];

        $this->render('frontpage', $data);

    }

    public function tags() {
        $tagModel = new Tag();
        $tags = $tagModel->getTags();

        foreach($tags as $tag) {
            $instance = new Tag($tag['Tag_ID'], $tag['Tag_Title']);
            $tagObjs[] = $instance;
        }
        return $tagObjs;
    }

}

?>