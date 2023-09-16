<?php

use models\ProductModel;

$product_id = $_GET['product_id'];


$model = new ProductModel();

$result = $model->add_to_cart($product_id);


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>