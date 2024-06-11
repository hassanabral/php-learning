<?php

namespace Core;
use Core\Middleware\Middleware;

class Router {
  private array $routes = [];
  public function __construct() {

  }

  public function get($uri, $controller) {
   return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller) {
    return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller) {
    return  $this->add('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller) {
    return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller) {
    return $this->add('PUT', $uri, $controller);
  }

  public function route($uri, $method) {
    foreach($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

        foreach($route['middlewares'] as $middlewareClass) {
          Middleware::resolve($middlewareClass);
        }

       return require base_path($route['controller']);
      }
    }
    $this->abort();
  }

  public function only($middlewareClass)
  {
    $this->routes[array_key_last($this->routes)]['middlewares'][] = $middlewareClass;

    return $this;
  }

  private function add($method, $uri, $controller) {
    $middlewares = [];
    $this->routes[] = compact('method', 'uri', 'controller', 'middlewares');

    return $this;
  }

  protected function abort($code = Response::NOT_FOUND): void {
    http_response_code($code);
    require base_path("views/{$code}.view.php");

    die();
  }
}



