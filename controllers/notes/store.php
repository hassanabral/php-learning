<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$validator = new Validator($_POST);

$errors = $validator->validate([
  'title' => 'required|min:1|max:1000',
  'body' => 'required|min:1|max:1000',
]) ?? [];

$isValid = empty($errors);

$currentUserId = 1;

if (!$isValid) {
  view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}
$db->query("INSERT INTO notes (title, body, user_id) VALUES(:title, :body, :user_id)",
  ['title' => $_POST['title'], 'body' => $_POST['body'], 'user_id' => $currentUserId]);

header('location: /notes');
die();





