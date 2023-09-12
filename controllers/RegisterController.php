<?php

use models\AuthModel;

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$adress = $_POST['adress'];


$auth = new AuthModel();

$user = $auth->create_user($password,$login,$email);

if(gettype($user) == 'array') {
    $_SESSION['user_id'] = $user['id'];
    header('location:/');
}
else {
    $_SESSION['error-message'] = "ERROR : " . $user;
    header('location:/register');

}


?>