<?php
$router->get('/','/index.php');
$router->get('/login','/login/create.php')->only('guest');
$router->post('/login','/login/store.php');

$router->get('/register','/register/create.php')->only('guest');
$router->post('/register','/register/store.php');


$router->post('/logout','/login/destroy.php')->only('auth');
