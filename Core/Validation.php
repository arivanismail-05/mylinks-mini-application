<?php

namespace Core;

class Validation
{
    public static function password($password,$min =1,$max = INF)
    {

        $password = trim($password);

        return $password >= $min && $password <= $max;
    }


    public static function email($email)
    {
        $email = trim($email);
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}