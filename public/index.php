<?php

require '../helpers.php';
// $config = require basePath('config/db.php');
// $db = new Database($config);
require basePath('Router.php');
require basePath('Database.php');

// Instantiate
$router = new Router();

// GET ALL ROUTES+METHODS
$routes = require basePath('routes.php');

// GET URI+HTTP METHOD
$uri=$_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// ROUTE the REQUEST
$router->route($uri,$method);
