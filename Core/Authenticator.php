<?php

namespace Core;

class Authenticator
{

    public function attempt($db,$username,$password)
    {
        $user = $db->query(('select * from users where username = :username'), [
            ':username' => $username
        ])->find();

        if($user){
            if(password_verify($password,$user['password'])){
               $this->login($user['username']);
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
            $this->login($user);
            return true;
        }

        return false;
    }





    public function login($user)
    {
        $_SESSION['user'] =  $user;
        // session_regenerate_id(true);

    }


    public static function logout()
    {
        Session::destroy();
    }


}