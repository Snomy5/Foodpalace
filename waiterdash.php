<?php
    session_start();
    if($_SESSION['status']!= "Active")
        header("location:waiterlog.html")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="waiterdash.css">
    <title>Waiter Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <div class="menu-button-container">
            <a href="index.html" class="menu-button" id="menuButton">☰ Menu</a>
        </div>
        <h1>Waiter Dashboard</h1>
        <div class="orders">
            <h2>My Orders</h2>
            <ul id="order-list"></ul>
        </div>
    </div>
    
   
    
    
    <script src="waiterdash.js"></script>
    
    <div class="logout-container">
        <button onclick="window.location.href='logout.php'" class="logout-btn">logout</button>
      
    </div>
   
</body>
</html>
