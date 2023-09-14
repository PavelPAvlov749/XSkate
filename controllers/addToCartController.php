<?php

use models\ProductModel;

$product_id = $_GET['product_id'];


$model = new ProductModel();

$result = $model->add_to_cart($product_id);

if($result) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>