<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$noteId = $_GET['id'] ?? 1;

$note = $db->query("select * from notes where id = :id", ['id' => $noteId])->findOrFail();

$currentUserId = 1;

authorized($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [
  'heading' => 'Edit Note',
  'errors' => [],
  'note' => $note
]);