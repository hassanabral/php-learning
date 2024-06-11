<?php

namespace Core\Middleware;

class Middleware
{
  /**
   * @throws \Exception
   */
  public static function resolve($middlewareClass) {

    if (!$middlewareClass || !class_exists($middlewareClass)) {
      return;
    }

    if (!is_subclass_of($middlewareClass, IMiddleware::class)) {
      throw new \Exception("Middleware {$middlewareClass} must implement IMiddleware interface.");
    }

    (new $middlewareClass)->handle();
  }
}