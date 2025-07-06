<?php

namespace Core;

class Authenticator
{
    public $userID;
    public $username;

    public function attempt($db,$username,$password)
    {
        $user = $db->query(('select * from users where username = :username'), [
            ':username' => $username
        ])->find();
       
        

        if($user){
            if(password_verify($password,$user['password'])){
                $this->username = $user['username'];
                $this->userID = $user['id'];
                $this->login($this->username,$this->userID);
               return true;
            }
            
        }else{
            return false;
        }

      
    }




    public function register($db,$username,$password,$email)
    {
        $user = $db->query(('insert into users(username,email,password) values(:username,:email,:password)'), [
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password,PASSWORD_BCRYPT)
        ]);
        if($user){
            $user = $db->query(('select * from users where username = :username'), [
            ':username' => $username
        ])->find();
            $this->username = $user['username'];
            $this->userID = $user['id'];
            $this->login($this->username,$this->userID);

            return true;
        }

        return false;
    }


    public function login($username,$userID)
    {
        $ss =  new Session();
        $ss->login($username,$userID);
    }

    public function logout()
    {
        (new Session)->destroy();
    }


}