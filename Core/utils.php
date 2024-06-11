<?php

use Core\Response;

function dd($value) {
  echo '<pre>';

  var_dump($value);

  echo '</pre>';

//  die();
}

function utlIs($value) : bool {
  return $_SERVER['REQUEST_URI'] === $value;
}

function authorized($condition, $status = Response::FORBIDDEN): void {
  if (!$condition) {
    abort($status);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);

  require base_path('views/' . $path);
}

function abort($code = Response::NOT_FOUND) {
  http_response_code($code);
  require base_path("views/{$code}.view.php");

  die();
}

function capitalizeFirstLetter($str): string {
  return strtoupper($str[0]) . substr($str, 1);
}