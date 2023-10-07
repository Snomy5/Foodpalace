<?php
 include("coonection.php");
// Handle form submission
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["registerButton"])) {
        // Registration logic
        $waiterId = $_POST["waiter_Id"];
        $password = $_POST["password"];

        // Perform registration SQL query (make sure to hash the password for security)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO waiter where ( waiter_Id, password) VALUES ('$waiterId', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Waiter registered successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["unregisterButton"])) {
        // Unregistration logic
        $waiterId = $_POST["waiter_Id"];

        // Perform unregistration SQL query
        $sql = "DELETE FROM waiter WHERE waiter_Id = '$waiterId'";

        if ($conn->query($sql) === TRUE) {
            echo "Waiter unregistered successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
