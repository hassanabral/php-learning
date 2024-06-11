<?php

use Core\App;
use Core\Database;
use Core\Validator;

// validate form inputs
$validator = new Validator($_POST);

$errors = $validator->validate([
  'email' => 'required|min:6|email',
  'password' => 'required|min:6|alphanumeric',
]) ?? [];

$isValid = empty($errors);

if (!$isValid) {
  view("registration/create.view.php", [
    'errors' => $errors
  ]);
}

// check if the account already exists
$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", ['email' => $_POST['email']])->find();

if ($user) {
  // if yes, redirect to login page
  header('location: /');
  exit();
}

// save user into database
// save on to the database, log user in, and redirect
$db->query("INSERT INTO users(email, password) VALUES(:email, :password)",
  ['email' => $_POST['email'], 'password' => $_POST['password']]);

$_SESSION['user'] = [
  'email' => $_POST['email'],
];

header('location: /');
die();












