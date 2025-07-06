<?php

namespace Core\Middleware;



class Guest
{
    public function handle()
    {
        if(isset($_SESSION['username']) && isset($_SESSION['userID'])){
            redirect('/');
        }

    }
}