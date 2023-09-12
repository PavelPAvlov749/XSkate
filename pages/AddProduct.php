<section class="add-product">
    <h1>Add new Product</h1>
    <form action="/add-product" class="add-product__form" enctype="multipart/form-data" method="post">
        <input name="brand" type="text" placeholder="Brand" required>
        <input name="model" type="text" placeholder="Model" required>
        <select name="type" id="" required>
            <option value="1">Skates</option>
            <option value="2">Frames</option>
            <option value="3">Bearings</option>
        </select>
        <input type="text" placeholder="Description" name="description">
        <input type="number" id="" placeholder="Price" name="price" required>
        <input type="file" id="product_photo" name="photo">
        <label for="product_photo">
            <span>Add photo</span>
        </label>
        <button type="sumbit">Add</button>
        <p>
            <?php echo $_SESSION['error-message'] ?>
        </p>
    </form>
</section>