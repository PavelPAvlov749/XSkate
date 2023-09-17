<?php
session_start();
echo $_SESSION['user_id'];
if ($_SESSION['user_id']) {
    header('location:/');
}

?>


<form class="login-form" action="/auth" method="post">
    <h1 id="login-form__tittle">Login</h1>
    <input class="login-form__input" type="text" name="login" required placeholder="Login">
    <div class="password-input-container">
        <input class="login-form__input" type="password" name="password" id="password" required placeholder="Password">
        <button id="show_password" onclick="switchVisibility()" type="button">Show</button>
    </div>
    <button class="login-form__submit-button" type="submit">Login</button>
    <span>Dont have an account?</span>
    <a href="register">Register</a>
    <p class="message error-message">
        <?php
        echo $_SESSION['error-message'];
        ?>
    </p>

</form>