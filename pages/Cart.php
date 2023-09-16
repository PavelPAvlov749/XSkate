<?php

use models\ProductModel;

$model = new ProductModel();

$result = $model->get_product_cart($_SESSION['cart']);

?>

<section class="cart">
    <?php
    if(!count($result) < 1) {
        include "CartProducts.php";
        exit();
    }
    else
    {
        include 'EmtyCart.php';

    }
    ?>
    
</section>