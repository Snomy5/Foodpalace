<?php
include("coonection.php");

// Handle form submission
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get waiter ID from the form
$waiterIdToDelete = isset($_POST['waiter_id']) ? $_POST['waiter_id'] : null;

if ($waiterIdToDelete !== null) {
    // Your code to process the form submission goes here
} else {
    // Handle the case where 'waiterIdToDelete' is not set
    echo "Waiter ID is not set.";
}


// SQL query to delete a waiter from the database
$sql = "DELETE FROM waiter WHERE waiter_id = '$waiterIdToDelete'";

if ($conn->query($sql) === TRUE) {
    echo "Waiter unregistered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
mysqli_close($conn);
?>
