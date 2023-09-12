<?php

use models\ProductModel;
if(array_key_exists('error-message',$_SESSION)){
    unset($_SESSION['error-message']);
}

$product_model = new ProductModel();
$products = $product_model->products;


?>
<section>
    <section class="news container">
        <!-- SWIPER SECTION -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide">
                        <div class="article">
                            <h1>
                                Mesmer: Marc Moreno - Flashback
                            </h1>
                            <p>
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
                            <h1>
                                Istanbul Tour 2015 - Teaser - USD Skates
                            </h1>
                            <p>
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
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <section class="products">
        <section class="products_controls">
            <h1>Novelties</h1>
            <section class="products__controls">
                <span>Sort by :
                    <select name="sort-by" id="">
                        <option value="Date">Date</option>
                        <option value="Proce">Date</option>

                    </select>
                </span>
                <span>Type :
                    <select name="type" id="">
                        <option value="Skates">Skates</option>
                        <option value="Frames">Frames</option>
                        <option value="Wheels">Wheels</option>
                        <option value="Bearings">Bearings</option>
                    </select>
                </span>
            </section>
            <section class="products__list">
                <?php
                foreach ($products as $item) {
                    ?>

                    <div class="card">
                        <a href="./product?id=<?= $item['id'] ?>" class="card_link">
                            <img class="card__product-photo" src="<?= "../downloads/" . $item['photo'] ?>" alt="">
                            <h2>
                                <?= ucfirst($item['type']) . " " . $item['brand'] . " : " . $item['model'] ?>
                                <img id="icon" src="./assets/icons/unliked.png" alt="">
                            </h2>

                            <button class="card__add_to_card_button">Add to card</button>
                        </a>
                    </div>

                <?php } ?>

            </section>
        </section>