<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$user_id = $_GET['id'] ?? 1;

$user = $db->query("select * from users where id = :id", ['id' => $user_id])->findOrFail();
$notes = $db->query("select * from notes where user_id = :user_id", ['user_id' => $user_id])->findAllOrFail();

view("notes/index.view.php", [
  'heading' => 'My Notes',
  'notes' => $notes,
  'user' => $user
]);