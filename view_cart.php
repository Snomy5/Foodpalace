<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>

    <!-- Include your CSS file -->
    <link rel="stylesheet" href="view_cart.css">
</head>
<body>
<h1 class="dashboard-heading">Food Palace Menu</h1>

    <?php
    session_start(); // Start the session

    include("coonection.php"); 

    // Check if the cart is not empty
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        
        
        // Add single quotes around each item ID
        $cartItems = implode("','", $_SESSION['cart']);
        $selectSql = "SELECT * FROM item_c WHERE item_id IN ('$cartItems')";
        
        $result = mysqli_query($conn, $selectSql);

        // Check for errors in the query
        if (!$result) {
            die("Error in SQL query: " . mysqli_error($conn));
        }

        // Display cart items
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['item_id'];
                $quantity = isset($_SESSION['cart_qty'][$item_id]) ? $_SESSION['cart_qty'][$item_id] : 0;

                ?>
                <div class="cart-item">
                    <h3><?php echo $row['item_name']; ?></h3>
                    <p>Item ID: <?php echo $item_id; ?></p>
                    <p>Quantity: <?php echo $quantity; ?></p>
                    <?php 
                        $p= $row['item_price'];
                        $qp=$p * $quantity; 
                        ?>
                    <p> price: <?php echo $qp; ?> </p>    
                    
                </div>
                <?php
            }
        } else {
            echo "No items found in the cart.";
        }
    } else {
        echo "Your cart is empty.";
    }

    // Handle clearing the cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
        // Clear the session cart
        $_SESSION['cart'] = array();
        $_SESSION['cart_qty'] = array(); 

        // Retrieve the menuCategory from the form
        $menuCategoryFromForm = isset($_POST['menu_category']) ? $_POST['menu_category'] : '';
        echo '<Script> 
                  alert ("Cart cleared.");
                  window.location.href= "menuret.php?' . $menuCategoryFromForm . '";
        </script>';
    }

    mysqli_close($conn);
    ?>
    <form action="" method="POST">
            <input type="hidden" name="menu_category" value="<?php echo $menuCategory; ?>">
            <button type="submit" name="clear_cart" class="clear-cart-button">Clear Cart</button>
        </form>
    

</body>
</html>
