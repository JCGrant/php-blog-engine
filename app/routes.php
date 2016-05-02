<?php

$app->get('/', function($request, $response, $args) {
  return $this->view->render($response, 'home.html');
})->setName('home');

$app->get('/blog', function($request, $response, $args) {
  $sql = "SELECT id, title, content, datetime FROM post";
  $stmt = $this->db->query($sql);
  $posts = [];
  while ($row = $stmt->fetch()) {
    $posts[] = new Post($row);
  }
  return $this->view->render($response, 'blog.html', ['posts' => $posts]);
})->setName('blog');

$app->get('/blog/post/{id:[0-9]+}', function($request, $response, $args) {
  $post_id = $args['id'];
  $sql = "SELECT id, title, content, datetime " .
         "FROM post " .
         "WHERE id=$post_id";
  $stmt = $this->db->query($sql);
  if (!$row = $stmt->fetch()) {
    return $response->withStatus(302)->withHeader('Location', '/404');
  }
  $post = new Post($row);
  return $this->view->render($response, 'post.html', ['post' => $post]);
})->setName('post');

?>
