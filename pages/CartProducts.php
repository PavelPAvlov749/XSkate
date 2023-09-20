<table class="cart__order-table">
    <tr>
        <th>Image</th>
        <th>Model</th>
        <th>Brand</th>
        <th>Price</th>
    </tr>
    <tr>
        <?php
        foreach ($result as $item) {
            ?>
        <tr>
            <td><img class="order-table__photo" src="../downloads/<?= $item['photo'] ?>" ?></td>
            <td>
                <?= $item['model'] ?>
            </td>
            <td>
                <?= $item['brand'] ?>
            </td>
            <td>
                <?= $item['price'] ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td>Total Price : </td>
        <td>
            <?php
            $total = 0;
            foreach ($result as $item) {
                $total += (int) $item['price'];
            }
            echo $total;
            ?>
        </td>
    </tr>
</table>
<div class="cart__controls">
    <a href="/clear_cart" class="controls__btn">Delete all</a>

    <a href="/order" class="controls__btn">Continue Order</a>

</div>