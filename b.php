<?php
include("coonection.php");

// Retrieve items from the item_c table
$selectSql = "SELECT * FROM item_c";
$result = mysqli_query($conn, $selectSql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div>
            <h3><?php echo $row['item_name']; ?></h3>
            <p><?php echo $row['item_description']; ?></p>
            <p>Price: $<?php echo $row['item_price']; ?></p>
            
            <!-- Form to add item to cart with increment and decrement buttons -->
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                
                <!-- Quantity input with increment and decrement buttons -->
                <div>
                    <label for="quantity">Quantity:</label>
                    <input type="button" value="-" onclick="decrementQuantity(this)">
                    <input type="text" name="quantity" id="quantity" value="1">
                    <input type="button" value="+" onclick="incrementQuantity(this)">
                </div>
                
                <input type="submit" name="add_to_cart" value="Add to Cart">
            </form>
        </div>

        <script>
            function incrementQuantity(element) {
                var quantityInput = element.parentNode.querySelector('#quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
            }

            function decrementQuantity(element) {
                var quantityInput = element.parentNode.querySelector('#quantity');
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }
        </script>

        <?php
    }
} else {
    echo "No items found.";
}

mysqli_close($conn);
?>
