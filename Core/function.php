<?php

use Core\Router;

function base_path($path){
  
    return BASE_PATH . $path;
}


function veiw($path){
    require base_path('views\\'.$path);
}