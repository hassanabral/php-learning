<?php

function routeToController($path, $routes) {
  if (array_key_exists($path, $routes)) {
    require $routes[$path];
  } else {
    abort();
  }
}

function abort($code = Response::NOT_FOUND, $errors = []) {
  http_response_code($code);
  require "views/{$code}.view.php";

  die();
}

$routes = require('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI']);
$path = $uri['path'];

routeToController($path, $routes);
