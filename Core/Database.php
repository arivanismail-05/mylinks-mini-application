<?php

namespace Core;

use PDO;

class Database
{

    public $connection;
    protected $statement;


    public function __construct($config,$username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config , '', ';');
        $this->connection = new PDO($dsn,$username,$password);
    }


    public function query($query,$param = [])
    {

        $this->statement = $this->connection->prepare($query);
        
        $this->statement->execute($param);
        return $this;
    }


    public function get()
    {
        return $this->statement->fetchAll();
    }


    public function find()
    {
        return $this->statement->fetch();
    }


    public function findOrFail()
    {
        $result = $this->find();

        if(!$result){
            die('fail');
        }
    }
}