<?php

use models\AuthModel;

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$adress = $_POST['adress'];


$auth = new AuthModel();

$user = $auth->create_user($password,$login,$adress,$email);

if($user) {
    $_SESSION['user_id'] = $user['id'];
    header('location:/');
}
else {
    $_SESSION['error-message'] = "ERROR : Cant`create user";
    header('location:/register');

}


?>