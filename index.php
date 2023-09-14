<?php
session_start();
use models\Model;
use models\ProductModel;
ini_set("display_errors", 0);

error_reporting(E_ALL);

function debug($str): string
{
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
    exit;
}

require_once("./router/router.php");

spl_autoload_register(function ($class_name) {

    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

    include "." . DIRECTORY_SEPARATOR . $file;
});


$model = new Model();
$product = new ProductModel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MAIN SCRIPTS -->
    <script src="./public/Scripts/index.js" defer></script>
    <!-- SWIPER IMPORTS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="./public/Scripts/Swiper.js" defer></script>
    <!-- STYLES IMPORT  -->
    <link rel="stylesheet" href="./public/Styles/Cart.css">
    <link rel="stylesheet" href="./public/Styles/Profile.css">
    <link rel="stylesheet" href="./public/Styles/ProductPage.css">
    <link rel="stylesheet" href="./public/Styles/index.css">
    <link rel="stylesheet" href="./public/Styles/registration.css">
    <link rel="stylesheet" href="./public/Styles/AddProduct.css">
</head>

<body>
    <?php


    $router = new Router();
    if(!$_SESSION['cart']){
        $_SESSION['cart'] = "";
    } 

    include('./pages/templates/header.php');
    $router->route();

    ?>
</body>

</html>