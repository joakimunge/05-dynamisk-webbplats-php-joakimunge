<?php 

namespace Blog\Views;

class Blogpost {

    private $title;
    private $content;
    private $author;
    private $date;
    private $image;

    public function __construct(string $title, string $content, string $author, string $date, string $image) {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;     
        $this->image = $image; 
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

}

?>