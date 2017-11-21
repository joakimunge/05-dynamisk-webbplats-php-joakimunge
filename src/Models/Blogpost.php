<?php 

namespace Blog\Models;
use Blog\Core\Database;

class Blogpost {

    private $title;
    private $content;
    private $author;
    private $date;
    private $image;
    private $id;
    private $authorId;
    private $tags = [];

    public function __construct(
        string $title, 
        string $content, 
        string $author, 
        string $date, 
        string $image, 
        int $id, 
        int $authorId, 
        $tags = '') 
        {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;     
        $this->image = $image; 
        $this->id = $id;
        $this->authorId = $authorId;
        $this->tags[] = $tags;     
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getAuthorId() {
        return $this->authorId;
    }

    public function getDate() {
        return $this->date;
    }
    
    public function getImagePath() {
        return $this->image;
    }

    public function getId() {
        return $this->id;
    }

    public function getTags() {
        foreach($this->tags as $tag) {
            return $tag;
        }
    }

    public function getURL() {
        return '/post?id=' . $this->getId();
    }

    public function getFavStatus() {
        $db = new Database();
        $row = $db->query('SELECT * FROM user_fav WHERE entry_id = ? AND user_id = ?', 
        [$this->getId(), $_SESSION['id']]);

        if (count($row) >= 1) {
            return 'blog__icon-fav--active';
        }

        return;
    }

    public function getFavs() {
        $db = new Database();
        $favs = [];
        $entries = $db->query('SELECT * FROM user_fav WHERE entry_id = ' . $this->id);
        return count($entries);
    }

    public function userCanEdit() {
        if (isset($_SESSION['loggedin'])) {

            if ($_SESSION['id'] == $this->authorId || $_SESSION['admin'] === '1') {               
                return true;
            } else {
                return false;
            }
        }
    }

}

?>