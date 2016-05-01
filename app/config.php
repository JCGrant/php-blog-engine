<?php

$config = json_decode(file_get_contents("config.json"), true);

return [
  'settings' => [
    'displayErrorDetails' => true,
    'db' => $config['db'],
  ],
];

?>
