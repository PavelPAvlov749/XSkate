<section class="register">
    <h1 class="register__header">Create Account</h1>
    <form class="register__form" action="/auth-register" class="register-page__form" method="post"
        enctype="multipart/form-data">
        <input type="text" name="login" required placeholder="Login">
        <input type="text" name="password" required placeholder="Password">
        <input type="text" name="repeat_password" required placeholder="Repeat password">
        <input type="text" name="email" required placeholder="Email">
        <input type="text" name="adress" placeholder="Adress">

        <button class="register__submit-btn" type="Submit">Register</button>
    </form>
    <p class="register__error-message--show">
        <?php
        echo $_SESSION['error-message'];

        ?>
    </p>
</section>