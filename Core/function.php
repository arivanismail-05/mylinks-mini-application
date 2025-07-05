<?php

use Core\Router;
use Core\Session;




function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}


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



function old($key,$default = null)
{
  return  Session::get('old')[$key] ?? $default;
}