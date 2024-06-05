<?php

$heading = "Create a note";

$config = require('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];

  ['isValid' => $isValid, 'errors' => $errors] = validate($title, $body);

  $currentUserId = 1;

  if ($isValid) {
    $db->query("INSERT INTO notes (title, body, user_id) VALUES(':title', ':body', ':user_id')",
      ['title' => $_POST['title'], 'body' => $_POST['body'], 'user_id' => $currentUserId]);
  }

}

function validate($title, $body): array {
  $errors = [];

  if (strlen($title) === 0) {
    $errors['title'] = 'Title is required';
  }
  if (strlen($body) === 0) {
    $errors['body'] = 'Body is required';
  }

  $MAX_CHARS = 1000;

  if (strlen($title) > $MAX_CHARS) {
    $errors['title'] = "Title can not be more than {$MAX_CHARS}";
  }

  if (strlen($body) > $MAX_CHARS) {
    $errors['body'] = "Body can not be more than {$MAX_CHARS}";
  }

  return ['isValid' => empty($errors), 'errors' => $errors];
}


require 'views/notes-create.view.php';