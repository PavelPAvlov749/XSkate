<?php
use models\ProductModel;

$product = new ProductModel();
$product_id = $_GET['id'];
// var_dump(s$product->products);
$result = $product->get_product_by_id($product_id)[0];



?>
<section class="product-page container">


        <img class="product-page__photo" src="<?= "../downloads/" . $result['photo'] ?>" alt="">
        <div class="short_description">
            <h2 class="product_page__full-name">
                <?= ucfirst($result['brand']) ?>
                <?= ucfirst($result['model']) ?>
            </h2>
            <h2 class="product-page__price">
                Price :
                <?= $result['price'] ?> RUB
            </h2>
            <div class="product-page__buttons">
                <a href="./addToCart?product_id=<?=$result['id']?>" class="product-page__buy_btn">Add to cart</a>
            </div>
            <h2 class="product-page__description-tittle">Description</h2>
            <p>
                <?= $result['description'] ?>

            </p>

        </div>


</section>