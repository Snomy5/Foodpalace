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
<h1 class="dashboard-heading">Food Palace Menu</h1>

    <?php
    session_start(); // Start the session

    include("coonection.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //  if the 'momo', 'chinese', or 'beverage' parameter is set
        if (isset($_GET['momo']) || isset($_GET['chinese']) || isset($_GET['beverage'])) {
            
            $menuCategory = '';
            if (isset($_GET['momo'])) {
                $menuCategory = 'momo';
            } elseif (isset($_GET['chinese'])) {
                $menuCategory = 'chinese';
            } elseif (isset($_GET['beverage'])) {
                $menuCategory = 'beverage';
            }
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
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </form>

                        <!-- Plus and Minus buttons for quantity -->
                        <form action="update_cart.php" method="POST" class="quantity-form">
                            <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                        <!-- <button type="submit" name="increase_quantity">+</button>
                            <button type="submit" name="decrease_quantity">-</button> -->
                        </form>
                    </div>
            <?php
        }
    }} else {
        echo "No items found.";
    }

    // Display shopping cart icon and item count
    ?>
    <div class="cart-container">
    <form action="view_cart.php" method="GET">
        <button type="submit" name="view_cart" class="cart-icon-button">
           <!-- <img src="images/cart.png" alt="Shopping Cart" class="cart-icon"> -->
            <span class="item-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>View Cart
        </button>
    </form>

        <!-- Add a button to clear the cart -->
        <form action="" method="POST">
            <button type="submit" name="clear_cart" class="clear-cart-button">Clear Cart</button>
        </form>
    </div>

    <?php

    // Handle clearing the cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
        // Clear the session cart
        $_SESSION['cart'] = array();
        $_SESSION['cart_qty'] = array(); 
        echo "Cart cleared.";
    }

    // Handle adding items to the cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];

        // Add the item and quantity to the session cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart_qty'] = array();
        }

      
        $_SESSION['cart'][] = $item_id;
        $_SESSION['cart_qty'][$item_id] = $quantity; 

     
        
        echo '<script type="text/JavaScript">  
                alert("Item  added to the cart."); 
            </script>' 
         ;   
         
    }

    mysqli_close($conn);
    ?>

</body>
</html>
