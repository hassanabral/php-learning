<?php

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