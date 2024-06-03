<?php

require 'utils.php';
require 'Database.php';
//require 'router.php';

// connect to our MySQL database.
$config = require('config.php');
$db = new Database($config['database']);


// query for posts
$posts = $db->query("select * from posts where id = :id", ['id' => 1])->fetchAll();;

dd($posts);

