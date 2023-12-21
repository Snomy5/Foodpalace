<?php
include("coonection.php");

// Handle form submission
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve menu items from the database
$menuQuery = "SELECT * FROM item";
$result = $conn->query($menuQuery);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="row foodItem">';
        echo '<div class="col-9 foodItemName">';
        echo '<p>' . $row['item_name'] . '<span>';
        echo '<img class="vegIcon" src="./images/veg.webp" alt="veg-icon" />';
        echo '</span></p>';
        echo '<p class="text-muted-small"><i class="fas fa-rupee-sign"></i>' . $row['item_price'] . '</p>';
        echo '</div>';
        echo '<div class="col-3 addCol">';
        echo '<span class="menuBtn minus"><i class="fas fa-minus"></i></span>';
        echo '<span class="quantity">0</span>';
        echo '<span class="menuBtn plus"><i class="fas fa-plus"></i></span>';
        echo '</div>';
        echo '</div>';
        echo '<hr class="foodItemHr" />';
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
