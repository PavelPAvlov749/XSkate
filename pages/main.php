<?php

use models\ProductModel;
if(array_key_exists('error-message',$_SESSION)){
    unset($_SESSION['error-message']);
}

$product_model = new ProductModel();
$products = $product_model->products;


?>
<section>
    <section class="news ">
        <!-- SWIPER SECTION -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide">
                        <div class="article">
                            <h1 class="slide__tittle">
                                Mesmer: Marc Moreno - Flashback
                            </h1>
                            <p class="slide__description">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Quaerat veniam maiores, nam ducimus iure nostrum dolorum optio
                                aperiam rem eum minima inventore reiciendis excepturi
                                distinctio nesciunt explicabo dignissimos, rerum ratione?
                            </p>

                        </div>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Rj5rGmxYj0w?rel=0"
                            frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="slide">
                        <div class="article">
                            <h1 class="slide__tittle">
                                Istanbul Tour 2015 - Teaser - USD Skates
                            </h1>
                            <p class="slide__description">
                                Istanbul Tour 2015 - Teaser - USD Skates - Small tease for our main blade blockbuster, a
                                close to 10
                                minutes monster of the Istanbul Tour.
                                Featuring:
                                Chris Farmer
                                Eugen Enin
                                Montre Livingston
                                Nick Lomax
                                Richie Eisler

                                Shot & cut by Karsten Boysen.
                            </p>

                        </div>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/BmScmr9ozLs?rel=0"
                            frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="products container">
    <section class="products_controls ">
        <h1 class="produts__tittle">Novelties</h1>
        <section class="product__filter-form">
            <!-- Сортировка по дате или цене -->
            <span>Sort by :
                <select name="sort-by" id="">
                    <option value="Date">Date</option>
                    <option value="Price">Price</option> <!-- Исправлена опечатка в значении -->
                </select>
            </span>
            <!-- Фильтр по типу товаров -->
            <span>Type :
                <select name="type" id="">
                    <option value="Skates">Skates</option>
                    <option value="Frames">Frames</option>
                    <option value="Wheels">Wheels</option>
                    <option value="Bearings">Bearings</option>
                </select>
            </span>
        </section>
      
    </section>
    <ul class="products__list">
            <?php
            foreach ($products as $item) {
                ?>

                <li class="products__list__item">
                    <!-- Ссылка на страницу товара -->
                    <a href="./product?id=<?= $item['id'] ?>" class="card_link">
                        <!-- Изображение товара -->
                        <img class="product-list__item__photo" src="<?= "../downloads/" . $item['photo'] ?>" alt="">
                        <h2 class="product-list__item__name">
                            <!-- Название товара -->
                            <?= ucfirst($item['type']) . " " . $item['brand'] . " : " . $item['model'] ?>
                            <!-- Иконка для отображения состояния "не в избранном" -->
                        </h2>
                        <h2 class="product-list__item__price">
                            <!-- $<?=$item['price']?> -->
                        </h2>
                        <!-- Ссылка для добавления товара в корзину -->
                      
                    </a>
                    <button onclick="addToCart(<?=$item['id']?>)" class="product-list__item__add-to-cart">Add to cart</button>
            </li>

            <?php } ?>
            </ul>
</section>

