<?php
use models\ProductModel;

$product = new ProductModel();

$product_list = $product->get_products_by_type(1);


?>


<section class="skates">
    <h2>Skates</h2>
    <ul class="skates__list">
        <?php
            foreach($product_list as $item) {?>
                <div class="skates__list__item">
                    <img class="card__product-photo" src="../downloads/<?=$item['photo']?>" alt="">
                    <h2><?=$item['brand'] . " : " . $item['model'] ?></h2>
                </div>
            <?php }
        ?>
    </ul>
</section>