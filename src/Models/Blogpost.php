<?php 

namespace Blog\Models;

class Blogpost {

    private $title;
    private $content;
    private $author;
    private $date;
    private $image;
    private $id;

    public function __construct(string $title, string $content, string $author, string $date, string $image, int $id) {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;     
        $this->image = $image; 
        $this->id = $id;
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

    public function getDate() {
        return $this->date;
    }
    
    public function getImagePath() {
        return $this->image;
    }

    public function getId() {
        return $this->id;
    }

    public function getURL() {
        return '/post?id=' . $this->getId();
    }

}

?>