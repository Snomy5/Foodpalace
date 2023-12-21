<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>

    <!-- Include your CSS file -->
    <link rel="stylesheet" href="menulist.css">
</head>
<body>

    <?php
    session_start(); // Start the session

    include("coonection.php");

    // Retrieve items from the item_c table
    $selectSql = "SELECT * FROM item_c";
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
                    <!--<button type="submit" name="increase_quantity">+</button>
                    <button type="submit" name="decrease_quantity">-</button> -->
                </form>
            </div>
            <?php
        }
    } else {
        echo "No items found.";
    }

    // Display shopping cart icon and item count
    ?>
    <div class="cart-container">
        <a href="view_cart.php">
            <img src="cart-icon.png" alt="Shopping Cart">
            <span class="item-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
        </a>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
        $item_id = $_POST['item_id'];

        // Add the item to the session cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // You should add more details to the cart, such as quantity, etc.
        $_SESSION['cart'][] = $item_id;

        // You should implement the logic to add the item to the cart table here
        // For simplicity, we'll just echo a message
        echo "Item with ID $item_id added to the cart.";
    }

    mysqli_close($conn);
    ?>

</body>
</html>
