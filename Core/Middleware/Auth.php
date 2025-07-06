<?php

namespace Core\Middleware;



class Auth
{
    public function handle()
    {
        if(!isset($_SESSION['username']) && !isset($_SESSION['userID'])){
            redirect('/');
        }
    }
}