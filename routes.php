<?php
$router->get('/','/index.php');
$router->get('/login','/login/create.php');
$router->get('/register','/register/create.php');
$router->post('/register','/register/store.php');