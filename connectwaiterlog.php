<?php
$servername = "localhost"; // MySQL server name (usually "localhost" if the database is on the same server)
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "foodpalace"; // MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database,3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
