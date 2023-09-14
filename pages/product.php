<?php
use models\ProductModel;

$product = new ProductModel();
$product_id = $_GET['id'];
// var_dump(s$product->products);
$result = $product->get_product_by_id($product_id)[0];



?>
<section class="product-page">


    <article>
        <img class="product-page__photo" src="<?= "../downloads/" . $result['photo'] ?>" alt="">
        <div class="short_descriptiion">
            <h2 class="product_page__brand">
                <?= ucfirst($result['type']) ?> :
                <?= ucfirst($result['brand']) ?>
                <?= ucfirst($result['model']) ?>
            </h2>
            <h2 class="product_page__price">
                Price :
                <?= $result['price'] ?> RUB
            </h2>
            <div class="product-page__buttons">
                <button href="./add_tocart?id=<?= $result ?>" class="buy_btn">Add to cart</button>
                <img class="icon" src="../public/Assets/Icons/unliked.png" alt="">
            </div>
            <h2>Description</h2>
            <p>
                <?= $result['description'] ?>

            </p>

        </div>

    </article>

</section>