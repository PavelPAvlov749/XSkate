<?php
session_start();

use models\User;

$login = $_SESSION['login'];
$adress = $_SESSION['adress'];
$email = $_SESSION['email'];

?>

<section class="profile">
    <!-- PROFILE MAIN INFO -->
    <section class="profile__info">
        <h2 class="profile__username">
            <?= $login ?>
        </h2>
        <h2>Email :
            <span>
                <?= $email ?>
            </span>
        </h2>
        <h2>Delivery adress :
            <span>
                <?= $adress ?>
            </span>
        </h2>
    </section>
    <!-- LIKED PRODUCTS LIST SECTION -->
    <section class="profile__liked-products">

    </section>
</section>