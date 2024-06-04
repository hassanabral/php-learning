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