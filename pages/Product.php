<?php
use models\ProductModel;

// Получаем значения фильтров из GET-параметров
$filter_type = $_GET['type'];

$brand = $_GET['brand'];
$offset = $_GET['page'];

$type = explode("/", explode("?", $_SERVER['REQUEST_URI'])[0])[1];


// Создаем экземпляр класса ProductModel
$product = new ProductModel();

$brands = $product->get_brands(ucfirst($type));


$products = $product->get_product_list($brand, $type, $offset);

?>

<section class="product container">
    <form action="" class="product__filter-form">
        <select name="brand" id="brand-filter">
            <?php
            // Выводим варианты для фильтрации по бренду
            foreach ($brands as $item) {
                var_dump($brands);
                ?>
                <option value="<?= $item['brand_string'] ?>">
                    <?= $item['brand_string'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <select name="size" id="size-filter">
            <?php
            // Выводим варианты для фильтрации по размеру
            foreach ($products['size'] as $item) {
                ?>
                <option value="<?= $item ?>">
                    <?= $item ?>
                </option>
                <?php
            }
            ?>
        </select>
    </form>
    <ul class="products__list">
        <?php
        // Выводим список продуктов
        foreach ($products as $item) {
            ?>
            <li class="product-list__item">
                <a href="/product?id=<?=$item['id']?>">
                    <img class="product-list__item__photo" src="../downloads/<?= $item['photo'] ?>" alt="">
                    <h2 class="product-list__item__name">
                        <?= $item['brand'] . " " . $item['model'] ?>
                    </h2>
                    <span>
                        <?= $item['price'] ?>&#8381
                    </span>
                    <button onclick="addToCart(<?= $item['id'] ?>)" class="card__add_to_cart_button">Add to cart</button>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</section>