<?php

$heading = "Notes";

$config = require('config.php');
$db = new Database($config['database']);

$user_id = $_GET['id'] ?? 1;

$user = $db->query("select * from users where id = :id", ['id' => $user_id])->fetch();
$notes = $db->query("select * from notes where user_id = :user_id", ['user_id' => $user_id])->fetchAll();

require 'views/notes.view.php';