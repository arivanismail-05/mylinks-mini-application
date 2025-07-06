<?php

namespace Core\Middleware;


class Middleware
{
    public const MID = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];


    public static function resolve($key)
    {
        if(!$key){
            return;
        }

        $middleware = static::MID[$key] ?? false;

        if(!$middleware){
            throw new \Exception('the middleware not foundedn'. $key);
        }

        (new $middleware)->handle();
    }
}