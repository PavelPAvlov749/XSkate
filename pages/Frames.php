<?php
use models\ProductModel;

$product = new ProductModel();
$filer_brand = $_GET['Brand'];
if ($filer_brand !== "All") {
    $product_list = $product->get_product_by_brand($filer_brand, "2");
} else {
    $product_list = $product->get_products_by_type(2);

}

?>


<section class="frames">
    <h2>FRAMES</h2>
    <form action="" class="frames__filter-form">
        <select name="Brand" id="" oninput='if(this.value != 0) { this.form.submit(); }'>
            <option value="All">...</option>
            <option value="All">All</option>
            <option value="Kizer">Kizer</option>
            <option value="Ground Control">Ground Control</option>
            <option value="Kaltik">Kaltik</option>
        </select>
    </form>
    <ul class="skates__list">
        <?php
        foreach ($product_list as $item) { ?>
            <div class="skates__list__item">
                <a href="/product?id=<?= $item['id'] ?>">
                    <img class="card__product-photo" src="../downloads/<?= $item['photo'] ?>" alt="">
                    <h2>
                        <?= $item['brand'] . " : " . $item['model'] ?>
                    </h2>
                </a>
                <button onclick="addToCart(<?=$item['id']?>)" class="card__add_to_cart_button">Add to cart</button>

            </div>
        <?php }
        ?>
    </ul>
</section>