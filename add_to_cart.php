<?php
include("coonection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];

    echo '<form action="buy_item.php" method="POST">
            <input type="hidden" name="item_id" value="' . $item_id . '">
            <input type="submit" name="buy" value="Buy">
          </form>';
    // You should implement the logic to add the item to the cart table here
    // For simplicity, we'll just echo a message
    echo "Item with ID $item_id added to the cart.";
}

mysqli_close($conn);
?>
