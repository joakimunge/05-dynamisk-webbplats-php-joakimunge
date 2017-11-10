<?php 

namespace Blog\Models;
use Blog\Core\Database;

class Tag {

    private $id;
    private $title;
    private $connection;
    private $status;

    public function __construct(int $id = null, string $title = null, bool $status = false) {
        $this->id = $id;
        $this->title = $title;
        $this->connection = new Database();
    }

    public function getTags() {
        $sql = 'SELECT * FROM tags';
        return $this->connection->query($sql);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId() {
        return $this->id;
    }

    public function getPostByTag(array $data) {       
        $sql = 'SELECT * FROM posts WHERE tag_id = ?';
        return $this->connection->query($sql, $data);        

    }

    public function getURL() {
        return '?tag_id=' . $this->getId();
    }

    public function toggleStatus() {
        if ($this->status = false) {
            $this->status = true;
        } else {
            $this->status = false;
        }
    }

}


?>