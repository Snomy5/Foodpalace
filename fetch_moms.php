<?php
// Include session start at the beginning
session_start();

include("coonection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if any of the category parameters is set
    if (isset($_GET['momo'])) {
        $menuCategory = 'momo';
    } elseif (isset($_GET['chinese'])) {
        $menuCategory = 'chinese';
    } elseif (isset($_GET['beverage'])) {
        $menuCategory = 'beverage';
    } else {
        // Default to a category or handle the case when no category is specified
        $menuCategory = 'momo';  // Change this to your default category
    }

    // Retrieve items from the item_c table based on the category
    $selectSql = "SELECT * FROM item_c WHERE item_category = '$menuCategory'";
    $result = mysqli_query($conn, $selectSql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="item-container">
                <div class="item-details">
                    <h3><?php echo $row['item_name']; ?></h3>
                    <p><?php echo $row['item_description']; ?></p>
                    <p>Price: $<?php echo $row['item_price']; ?></p>
                </div>

                <!-- Form to add item to cart -->
                <form action="" method="POST">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <input type="hidden" name="item_price" value="<?php echo $row['item_price']; ?>">
                    <input type="number" name="quantity" value="0" min="0">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>

                <!-- Plus and Minus buttons for quantity -->
                <form action="update_cart.php" method="POST" class="quantity-form">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <button type="submit" name="increase_quantity">+</button>
                    <button type="submit" name="decrease_quantity">-</button>
                </form>
            </div>
            <?php
        }
    } else {
        echo "No items found in the specified category.";
    }
}

// ... Rest of your code ...

?>

