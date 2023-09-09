<?php
session_start();
use models\Model;
use models\ProductModel;


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
    <link rel="stylesheet" href="./public/Styles/ProductPage.css">
    <link rel="stylesheet" href="./public/Styles/index.css">
    <link rel="stylesheet" href="./public/Styles/registration.css">
</head>

<body>
    <?php


    $router = new Router();


    include('./pages/templates/header.php');
    $router->route();

    ?>
</body>

</html>