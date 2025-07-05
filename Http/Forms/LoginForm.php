<?php

namespace Http\Forms;
use Core\Validation;
use Core\ValidationException;

class LoginForm
{
    protected $error = [];

    public function __construct(public array $attibutes)
    {
        
        if(empty($attibutes['username']))
        {
            $this->error['username'] = 'username required!';
        }


        if(!Validation::password($attibutes['password'],8,255))
        {
             $this->error['password'] = 'password must be between 8 and 20';
        }
       
    }

    public function setError($field,$messeage)
    {
        $this->error[$field] = $messeage;
        return $this;
    }


    public function failed()
    {
        return count($this->error);
    }

    public function errors()
    {
        return $this->error;
    }


    public function throw()
    {
        ValidationException::throw($this->errors(),$this->attibutes);
    }

    public static function validate($attibutes)
    {
        $instance = new static($attibutes);
        return $instance->failed() ? $instance->throw() : $instance;
    }
}