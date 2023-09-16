<?php
use models\ProductModel;

// Получаем значения фильтров из GET-параметров
$filter_type = $_GET['type'];
$filter_brand = $_GET['brand'];

// Создаем экземпляр класса ProductModel
$product = new ProductModel();

// Получаем все продукты
$products = $product->get_all_products();
?>

<section class="product">
    <form action="" class="product__filter-form">
        <select name="brand" id="brand-filter">
            <?php
            // Выводим варианты для фильтрации по бренду
            foreach ($products as $item) {
                ?>
                <option value="<?= $item['brand'] ?>"><?= $item['brand'] ?></option>
                <?php
            }
            ?>
        </select>
        <select name="size" id="size-filter">
            <?php
            // Выводим варианты для фильтрации по размеру
            foreach ($products['size'] as $item) {
                ?>
                <option value="<?= $item ?>"><?= $item ?></option>
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
                <img class="product-list__item__photo" src="<?= $item['photo'] ?>" alt="">
                <h2 class="product-list__item__name">
                    <?= $item['brand'] . " " . $item['model'] ?>
                </h2>
                <button class="product-list__item__add-to-cart-btn">Add</button>
            </li>
            <?php
        }
        ?>
    </ul>
</section>