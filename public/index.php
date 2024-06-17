<?php

require '../helpers.php';
// loadView('home');

$uri=$_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];

require basePath('router.php');
