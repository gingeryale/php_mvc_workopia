<?php

require '../helpers.php';
// $config = require basePath('config/db.php');
// $db = new Database($config);
require basePath('Framework/Router.php');
require basePath('Framework/Database.php');

// Instantiate
$router = new Router();

// GET ALL ROUTES+METHODS
$routes = require basePath('routes.php');

// GET URI+HTTP METHOD
// parse_url parses url into componenets, here returns only uri PATH
$uri= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// ROUTE the REQUEST
$router->route($uri,$method);
