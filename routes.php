<?php

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only(Authenticated::class);
$router->get('/note', 'controllers/notes/show.php')->only(Authenticated::class);
$router->delete('/note', 'controllers/notes/destroy.php')->only(Authenticated::class);

$router->get('/note/edit', 'controllers/notes/edit.php')->only(Authenticated::class);
$router->patch('/note', 'controllers/notes/update.php')->only(Authenticated::class);

$router->get('/notes/create', 'controllers/notes/create.php')->only(Authenticated::class);
$router->post('/notes', 'controllers/notes/store.php')->only(Authenticated::class);

$router->get('/register', 'controllers/registration/create.php')->only(Guest::class);
$router->post('/register', 'controllers/registration/store.php')->only(Guest::class);