<?php

use Core\Router;

function base_path($path){
  
    return BASE_PATH . $path;
}


function veiw($path,$attributes = []){
    extract($attributes);
    require base_path('views\\'.$path);
}


function redirect($path)
{
    header("Location:{$path}");
    exit();
}