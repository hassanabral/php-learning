<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


// check that the corresponding note exists
$noteId = $_POST['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $noteId])->findOrFail();

$currentUserId = 1;

// check that the note belongs to the current user
authorized($note['user_id'] === $currentUserId);

// validate payload
$validator = new Validator($_POST);

$errors = $validator->validate([
  'title' => 'required|min:1|max:1000',
  'body' => 'required|min:1|max:10000',
]) ?? [];

$isValid = empty($errors);

$currentUserId = 1;

if (!$isValid) {
  view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
  ]);
}

// query for post
$db->query("update notes set title = :title, body = :body where id = :id",
  ['title' => $_POST['title'], 'body' => $_POST['body'], 'id' => $noteId]);

header("location: /note?id={$note['id']}");
die();





