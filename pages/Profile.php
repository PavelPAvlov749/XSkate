<?php
session_start();

use models\User;

$login = $_SESSION['login'];
$adress = $_SESSION['adress'];
$email = $_SESSION['email'];
$user = new User($login,$adress,$email);
$address = $user->get_user_adress($_SESSION['user_id'])[0];



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
        <h2 class="profile__delivery-adress">
        Delivery adress :
            <?php
          
            if($address) {?>
                <div class="adress">
                <span>Country : <?=$address['country']?></span>

                <span>City :  <?=$address['city']?></span>

                <span>Street :  <?=$address['street']?> <?=$address['building']?></span>

                </div>           
                <a href="/edir-adress" class="profile__edit-adress-btn">Edit adress</a>
            <?php
            }else {?>
    <a href="/add-adress">Add delivery adress</a>
<?php } ?>
          
       
        </h2>
    </section>
    <!-- ADMIN SECTION -->
    <section>
        <a href="/add_product" class="profile__add-product-btn">Add product</a>
    </section>
    <!-- LIKED PRODUCTS LIST SECTION -->
    <section class="profile__liked-products">

    </section>
</section>