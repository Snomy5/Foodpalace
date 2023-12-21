<?php
include("coonection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
    $item_id = $_POST['item_id'];

    // You should implement the logic to add the item to the order table here
    // For simplicity, we'll just echo a message
    echo "Item with ID $item_id bought.";
}

mysqli_close($conn);
?>

