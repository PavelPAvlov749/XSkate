<?php
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
        <li><a href="./skates.php">Skates</a></li>
        <li><a href="#">Protection</a></li>
        <li><a href="#">Cart</a></li>
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