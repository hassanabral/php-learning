<?php

require 'utils.php';
require 'Database.php';
require 'router.php';

// connect to our MySQL database
//$config = require('config.php');
//$db = new Database($config['database']);

// router
$uri = parse_url($_SERVER['REQUEST_URI']);
$path = $uri['path'];

routeToController($path, $routes);

