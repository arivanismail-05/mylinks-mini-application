<?php

namespace Core;

class Container
{

    protected $bindings = [];


    public function bind($key,$resolver)
    {

        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if(!array_key_exists($key,$this->bindings)){
            throw new \Exception("bindins not found sorry!");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}