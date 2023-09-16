<?php
use models\ProductModel;

$product = new ProductModel();
$filer_brand = $_GET['brand'];
if ($filer_brand !== "All") {
    $product_list = $product->get_product_by_brand($filer_brand,"1");
} else {
    $product_list = $product->get_products_by_type(1);

}

?>


<section class="skates">
    <h2 class="skates__tittle">Skates</h2>
    <section class="skates__filters">
      
        <form action="/filer_product" name="filter" method="post">
        <span>Brand</span>
            <select name="Brand" id=""  oninput='if(this.value != 0) { this.form.submit(); }'>
                <option value="All">...</option>
                <option value="All">All</option>
                <option value="Razors">Razors</option>
                <option value="USD">Usd</option>
                <option value="Roces">Rocess</option>
                <option value="Remz">Remz</option>
            </select>
            <span>Size</span>
            <select name="size" id="">
                <option value="All">All</option>
                <option value="43">43</option>
                <option value="42">42</option>
                <option value="41">41</option>
                <option value="40">40</option>
                <option value="38-40">38-40</option>
                <option value="37-38">37-38</option>
                <option value="36-38">36-38</option>
            </select>
        </form>

        <form action="" class="filters__search-form">
            <input type="text" name="search" placeholder="Search">
            <button class="filters__search-form__btn">Seacrh</button>
        </form>
    </section>

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