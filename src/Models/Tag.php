<?php 

namespace Blog\Models;
use Blog\Core\Database;

class Tag {

    private $id;
    private $title;

    // public function __construct(int $id, string $title) {
    //     $this->id = $id;
    //     $this->title = $title;
    // }

    public function getTags() {
        $db = new Database;

        $sql = 'SELECT * FROM tags';
        return $db->query($sql);
        
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId() {
        return $this->id;
    }

}


?>