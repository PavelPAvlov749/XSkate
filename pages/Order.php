<?php




?>
<section class="finish-order">
    <form class="finish-order__form" action="/finish-order" name="order" method="post">
    <h2 class="finish-order-tittle">FINISH ORDER</h2>

        <input type="text" name="coutry" placeholder="City" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="number" name="index" placeholder="Index" required>
        <input type="text" name="street" placeholder="Street" required>
        <input type="string" name="builidbng" placeholder="Building №" required>
        <button type="submit">Order</button>
    </form>
</section>