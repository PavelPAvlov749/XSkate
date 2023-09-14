<?php
use models\ProductModel;


$model = new ProductModel();
var_dump($_SESSION['user_id']);
$_SESSION['cart'] = "";

$model->clear_cart($_SESSION['user_id']);
header('location:/');

?>