<?php

use models\AuthModel;
use models\User;

$login = $_POST['login'];
$password = $_POST['password'];

$auth = new AuthModel();

$user_data = $auth->authenticate($login,$password);
$_SESSION['login'] = $user_data['login'];
$_SESSION['adress'] = $user_data['adress'];
$_SESSION['email'] = $user_data['email'];


try {
   
    if ($user_data) {
        $user = new User($user_data['login'],$user_data['adres'],$user_data['email'],$user_data['role']);
        header('location:/');
    }
    else {
        $_POST['error_message'] = "Error : Incorect login or password";
        header('location/login');
    }
    
}
catch (Exception $e) {
   echo $e->getMessage();
}


?>