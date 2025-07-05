<?php
use Core\Router;

const BASE_PATH = __DIR__ . '\..\\';


require BASE_PATH. 'Core\function.php';
require base_path('Core/Router.php');
require base_path('Core/Container.php');
require base_path('Core/Database.php');
require base_path('Core/Validation.php');
require base_path('Core/App.php');
require base_path('bootstrap.php');

$router = new Router();

$url = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = require base_path('routes.php');

$method = $_SERVER['REQUEST_METHOD'];



$router->route($url,$method);