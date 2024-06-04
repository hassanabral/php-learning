<?php

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php',
  '/contact' => 'controllers/contact.php'
];

function routeToController($path, $routes) {
  if (array_key_exists($path, $routes)) {
    require $routes[$path];
  } else {
    abort();
  }
}

function abort($code = Response::NOT_FOUND) {
  http_response_code($code);
  require "views/{$code}.view.php";

  die();
}
