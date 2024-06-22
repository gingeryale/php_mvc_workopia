<?php

require __DIR__ .'/../vendor/autoload.php';
require '../helpers.php';
// $config = require basePath('config/db.php');
// $db = new Database($config);

// spl_autoload replaced these
// require basePath('Framework/Router.php');
// require basePath('Framework/Database.php');

// good for small applications
// spl_autoload_register(function($class){
//     $path=  basePath('Framework/'. $class . '.php');
//     if(file_exists($path)){
//         require $path;
//     }
// });
use Framework\Router;


// Instantiate
$router = new Router();

// GET ALL ROUTES+METHODS
$routes = require basePath('routes.php');

// GET URI+HTTP METHOD
// parse_url parses url into componenets, here returns only uri PATH
$uri= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//$method = $_SERVER['REQUEST_METHOD'];

// ROUTE the REQUEST
//$router->route($uri,$method);
$router->route($uri);
