<?php

namespace Core\Middleware;

class Authenticated implements IMIddleware
{
  public function handle(): void
  {
      if (!$_SESSION['user'] ?? false) {
        header('location: /register');
        exit();
      }
  }
}