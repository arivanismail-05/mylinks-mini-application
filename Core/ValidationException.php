<?php

namespace Core;


class ValidationException extends \Exception
{

    public readonly array $error;
    public readonly array $old;


    public static function throw($error,$old)
    {

        $instance = new static;
        $instance->error = $error;
        $instance->old = $old;
    }
}