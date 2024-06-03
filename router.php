<?php

// router
$uri = parse_url($_SERVER['REQUEST_URI']);
$path = $uri['path'];

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php'
];

routeToController($path, $routes);

function routeToController($path, $routes) {
  if (array_key_exists($path, $routes)) {
    require $routes[$path];
  } else {
    abort();
  }
}

function abort($code = 404) {
  http_response_code($code);
  require "views/{$code}.view.php";

  die();
}
