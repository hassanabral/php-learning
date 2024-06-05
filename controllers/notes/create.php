<?php

$heading = "Create a note";

require 'Validator.php';
$config = require 'config.php';
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $validator = new Validator($_POST);

  $errors = $validator->validate([
    'title' => 'required|min:1|max:1000',
    'body' => 'required|min:1|max:1000',
  ]);

  $isValid = empty($errors);

  $currentUserId = 1;

  if ($isValid) {
    $db->query("INSERT INTO notes (title, body, user_id) VALUES(':title', ':body', ':user_id')",
      ['title' => $_POST['title'], 'body' => $_POST['body'], 'user_id' => $currentUserId]);
  }

}


require 'views/notes/create.view.php';