<?php

namespace Core;

use Exception;

class Container
{

  private $bindings = [];
  public function bind($key, $resolver) {
    $this->bindings[$key] = $resolver;

  }

  /**
   * @throws Exception
   */
  public function resolve($key) {
    if (!array_key_exists($key, $this->bindings)) {
      throw new Exception("No matching binding found for key :key", ['key' => $key]);
    }

    $resolver = $this->bindings[$key];
    return call_user_func($resolver);
  }

}