<?php

$heading = "Create a note";

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];

  $currentUserId = 1;

  $db->query("INSERT INTO notes (title, body, user_id) VALUES(':title', ':body', ':user_id')",
    ['title' => $_POST['title'], 'body' => $_POST['body'], 'user_id' => $currentUserId]);
}


require 'views/notes-create.view.php';