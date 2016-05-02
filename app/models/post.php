<?php

class Post {
  public $id;
  public $title;
  public $content;
  public $datetime;
  public $author;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->title= $data['title'];
    $this->content = $data['content'];
    $this->datetime = $data['datetime'];
    $this->author = $data['author'];
  }
}

?>
