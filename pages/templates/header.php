<?php
use models\ProductModel;

$model = new ProductModel();

$model->get_product_cart($_SESSION['user_id']);
$cart = $_SESSION['cart'];
session_start();

?>
<header class="header">
    <img class="logo" src="../../public/Assets/logo.png" alt="">
    <form class="header-search" action="">
      <input type="text" placeholder="Search">
      <button type="sumbit">Search</button>
    </form>
    <nav class="header__nav">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/skates">Skates</a></li>
        <li><a href="#">Protection</a></li>
        <li id="header__cart" ><a href="/cart">Cart</a><span class="counter"><?=count(explode(",",$cart)) -1 ;?></span></li>
        <?php
        if (!array_key_exists('user_id',$_SESSION)) {
          echo "<li><a href='/login'>Login</a></li>";
        } else {
          echo "<li><a href='/logout'>Logout</a></li>
                <li><a href='/profile'>Profile</a></li>";
        }
        ?>
      </ul>
    </nav>
  </header>