<?php

$routes = require('routes.php');

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
