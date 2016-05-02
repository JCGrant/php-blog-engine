<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'app/models/post.php';

$config = require __DIR__ . '/app/config.php';
$app = new Slim\App($config);

require __DIR__ . '/app/dependencies.php';
require __DIR__ . '/app/middleware.php';
require __DIR__ . '/app/routes.php';

$app->run();

?>
