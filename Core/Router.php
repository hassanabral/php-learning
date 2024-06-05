<?php

namespace Core;
class Router {
  private array $routes = [];
  public function __construct() {

  }

  public function get($uri, $controller): void {
   $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller): void {
    $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller): void {
    $this->add('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller): void {
    $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller): void {
    $this->add('PUT', $uri, $controller);
  }

  public function route($uri, $method): void {
    foreach($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
       require require base_path($route['controller']);
      }
    }
    $this->abort();
  }

  private function add($method, $uri, $controller): void {
    $this->routes[] = compact('method', 'uri', 'controller');
  }

  protected function abort($code = Response::NOT_FOUND): void {
    http_response_code($code);
    require base_path("views/{$code}.view.php");

    die();
  }
}



