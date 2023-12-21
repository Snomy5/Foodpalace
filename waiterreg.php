<?php
include("coonection.php");

// Handle form submission
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$waiterId = $_POST['waiterId'];
$username = $_POST['uname'];
$password = $_POST['password'];

// SQL query to insert data into the database
$sql = "INSERT INTO waiter (waiter_id, user_name, password) VALUES ('$waiterId', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New waiter added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
mysqli_close($conn);
?>
