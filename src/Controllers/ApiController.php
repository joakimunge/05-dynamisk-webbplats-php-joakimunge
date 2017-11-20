<?php 

namespace Blog\Controllers;
use Blog\Controllers\AbstractController;
use Blog\Core\Database;
use Blog\Models\Blogpost;

class ApiController extends AbstractController {

    public $posts = [];
    public $entries = [];

    public function filterByTag() {

        $ajaxResponse = json_decode($_POST['json'], true);
        $db = new Database();
        
        $tag = $ajaxResponse['tag_id'];

        if (count($tag) > 0) {
            
             // Build SQL 'IN' Values based on length of $tag array
            $IN_STRING = '(';
            foreach($tag as $value) {
                $IN_STRING .= '?,';
            }
            $IN_STRING = substr($IN_STRING, 0, -1) . ')';
    
            $this->entries = $db->query('SELECT * FROM entry_tag JOIN entries ON entry_tag.entry_id = entries.id WHERE tag_id IN ' . $IN_STRING, $tag);

            if (count($this->entries) === 0) {
                $this->noPostsFound();
                return;
            }

            foreach ($this->entries as $entry) {
                $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id'], $entry['author_id']);
                $this->posts[] = $post;
            }
        
            foreach ($this->posts as $post) {
                include ('./src/Templates/post_card.php');
            }
            return;
        }

        $this->entries = $db->query('SELECT * FROM entries');
        $this->renderBlogposts();
        
    }

    public function renderBlogposts() {
        foreach ($this->entries as $entry) {
            $post = new Blogpost($entry['title'], $entry['content'], $entry['author'], $entry['date'], $entry['image'], $entry['id'], $entry['author_id']);
            $this->posts[] = $post;
        }
    
        foreach ($this->posts as $post) {
            include ('./src/Templates/post_card.php');
        }
    }

    public function noPostsFound() {
        include './src/Templates/postsnotfound.php';
    }

    public function markFavorite() {
        $db = new Database();
        $postId = $_POST['id'];
        // $db->createOne('INSERT INTO user_fav SET entry_id = ?, user_id = ?', [$postId, $_SESSION['id']]);

        $rowExists = $db->query('SELECT * FROM user_fav WHERE entry_id = ? AND user_id = ?', [$postId, $_SESSION['id']]);

        if (count($rowExists) > 0) {
            $db->query('DELETE FROM user_fav WHERE entry_id = ? AND user_id = ?', [$postId, $_SESSION['id']]);
            return;
        }

        $db->query('INSERT INTO user_fav SET entry_id = ?, user_id = ?', [$postId, $_SESSION['id']]);

    }

}

?>