<?php
$heading = "Note";

$config = require('config.php');
$db = new Database($config['database']);

$noteId = $_GET['id'] ?? 1;

$note = $db->query("select * from notes where id = :id", ['id' => $noteId])->findOrFail();

$currentUserId = 1;

authorized($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';