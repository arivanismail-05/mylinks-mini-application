<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);


$errors = [];
$username = $_POST['username'];
$password = $_POST['password'];


if(empty($username))
{
    $errors['username'] = 'username required!';
}


if(!Validation::password($password,8,255))
{
    $errors['password'] = 'password must be between 8 and 20';
}



if(empty($errors)){
    $user = new Authenticator();
    $result = $user->attempt($db,$username,$password);

if($result){
   redirect('/');

}else{
redirect('/login');
}
}

return veiw('login\create.view.php',[
    'errors' => $errors
]);



    



