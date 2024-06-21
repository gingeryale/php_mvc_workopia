<?php

// call db to get the id of the listing
$config = require basePath('config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';

loadView('listings/show');