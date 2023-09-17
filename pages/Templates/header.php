<?php
use models\ProductModel;

$model = new ProductModel();

$model->get_product_cart($_SESSION['user_id']);

$cart = $_SESSION['cart'];
session_start();

?>
<header class="header">

  <nav class="header__nav">
    <div id="menuToggle" class="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
      <!-- LINKS LIST -->

      <ul id="menu">
        <li class="nav__item">
          <a href="/" class="nav__link">Home</a>
        </li>
        <li class="nav__item">
        <li><a href="/skates?brand=All&page=1">Skates</a></li>
        </li>
        <li class="nav__item">
        <li><a href="/frames?brand=All&page=1">Frames</a></li>
        </li>
        <li class="nav__item">
        <li><a href="/wheels?brand=All&page=1">Wheels</a></li>
        </li>
        <li id="header__cart"><a href="/cart">Cart</a><span class="counter">
            <?= count(explode(",", $cart)) - 1; ?>
          </span></li>
          <?php
      if (!array_key_exists('user_id', $_SESSION)) {
        echo "<li><a href='/login'>Login</a></li>";
      } else {
        echo "<li><a href='/logout'>Logout</a></li>
                <li><a href='/profile'>Profile</a></li>";
      }
      ?>
      </ul>
    </div>
    <ul class="header-nav__list">

      <li><a href="/">Home</a></li>
      <li><a href="/skates?brand=All&page=1">Skates</a></li>
      <li><a href="/frames?brand=All&page=1">Frames</a></li>
      <li><a href="/wheels?brand=All&page=1">Wheels</a></li>
      <li id="header__cart"><a href="/cart">Cart</a><span class="counter">
          <?= count(explode(",", $cart)) - 1; ?>
        </span></li>
      <?php
      if (!array_key_exists('user_id', $_SESSION)) {
        echo "<li><a href='/login'>Login</a></li>";
      } else {
        echo "<li><a href='/logout'>Logout</a></li>
                <li><a href='/profile'>Profile</a></li>";
      }
      ?>
    </ul>
  </nav>
  <img class="logo" src="../../public/Assets/logo.png" alt="">

</header>