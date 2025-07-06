<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validation;

$db = App::resolve(Database::class);


$errors = [];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];



if(empty($username))
{
    $errors['username'] = 'username required!';
}

if(Validation::email($password))
{
    $errors['email'] = 'email is not valid!';
}

if(!Validation::password($password,8,255))
{
    $errors['password'] = 'password must be between 8 and 20';
}



if(! empty($errors)){
    return veiw('register\create.view.php', [
        'errors' => $errors
    ]);
}
// echo $username. $password . $email;
$user = new Authenticator();

if($user->attempt($db,$username,$password)){
    redirect('/login');
}else{
    $user->register($db,$username,$password,$email);
    redirect('/');
}
    



