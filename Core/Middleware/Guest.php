<?php

namespace Core\Middleware;

class Guest implements IMIddleware
{
  public function handle(): void
  {
    if ($_SESSION['user'] ?? false) {
      header('location: /');
      exit();
    }
  }
}