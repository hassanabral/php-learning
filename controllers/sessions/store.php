<?php


use Core\App;
use Core\Database;
use Core\Validator;

// validate form inputs
$validator = new Validator($_POST);

$errors = $validator->validate([
  'email' => 'required|email',
  'password' => 'required',
]) ?? [];

$isValid = empty($errors);

if (!$isValid) {
  view("sessions/create.view.php", [
    'errors' => $errors
  ]);
}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", ['email' => $_POST['email']])->find();

// check if user exists and password matches
if (!$user || !password_verify($_POST['password'], $user['password'])) {
  view("sessions/create.view.php", [
    'errors' => ['email', 'No matching account found for that email address and password.']
  ]);
}

login([
  'email' => $user['email']
]);

redirect('/');












