<?php

$app->get('/', function($request, $response, $args) {
  return $this->view->render($response, 'home.html');
})->setName('home');

$app->get('/blog', function($request, $response, $args) {
  $sql = "SELECT name FROM test";
  $stmt = $this->db->query($sql);
  $results = [];
  while ($row = $stmt->fetch()) {
    $results[] = $row['name'];
  }
  return $this->view->render($response, 'blog.html', ['animals' => $results]);
})->setName('blog');

?>
