<?php
$heading = "Note";

$config = require('config.php');
$db = new Database($config['database']);

$noteId = $_GET['id'] ?? 1;

$note = $db->query("select * from notes where id = :id", ['id' => $noteId])->fetch();

require 'views/note.view.php';