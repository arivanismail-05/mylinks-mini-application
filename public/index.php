<?php
session_start();
use Core\Router;

const BASE_PATH = __DIR__ . '\..\\';


require BASE_PATH. 'Core\function.php';

require base_path('vendor/autoload.php');
require base_path('bootstrap.php');

$router = new Router();

$url = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = require base_path('routes.php');

$method = $_SERVER['REQUEST_METHOD'];



$router->route($url,$method);

