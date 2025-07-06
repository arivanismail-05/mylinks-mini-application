<?php
namespace Core;


class Session
{


     public $username;
     public $userID;
     public $isLoggedIn;


        public function __construct(){
        $this->Check_login();
    }



      public function login($username,$userID){
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $userID;
        $_SESSION['isLoggedIn'] = true;
        $this->username = $username;
        $this->userID = $userID;
        $this->isLoggedIn = true;
    }

    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['userID']);
        unset($_SESSION['isLoggedIn']);
        unset($this->username);
        unset($this->userID);
        unset($this->isLoggedIn);
    }

    private function Check_login(){
        if(isset($_SESSION['username']) && isset($_SESSION['isLoggedIn'])){
            $this->username = $_SESSION['username'];
            $this->userID = $_SESSION['userID'];
            $this->isLoggedIn = true;
        } else {
            unset($this->username);
            unset($this->userID);
            unset($this->isLoggedIn);
        }
    }


  
    public function destroy()
    {
        $this->logout();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}