<?php

$app->get('/', function($request, $response, $args) {
  return $this->view->render($response, 'home.html');
})->setName('home');

$app->get('/blog', function($request, $response, $args) {
  $sql = "SELECT id, title, content FROM post";
  $stmt = $this->db->query($sql);
  $posts = [];
  while ($row = $stmt->fetch()) {
    $posts[] = new Post($row);
  }
  return $this->view->render($response, 'blog.html', ['posts' => $posts]);
})->setName('blog');

?>
