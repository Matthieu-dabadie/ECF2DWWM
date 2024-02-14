<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
session_start();

use App\Autoloader;
use App\Core\Router;

include '../Autoloader.php';
Autoloader::register();


$route = new Router();
$route->routes();
