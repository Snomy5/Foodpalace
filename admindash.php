<?php
    include("coonection.php");
?>
<?php
  //  session_start();
    //if($_SESSION['status']!= "Active")
    //    header("location:login.html")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admindash1.css">
    <title>Admin Dashboard</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editMenuSelect = document.getElementById('edit-menu-select');
            editMenuSelect.addEventListener('change', function () {
                var selectedOption = editMenuSelect.value;
                if (selectedOption === 'add') {
                    window.location.href = 'addmenu.html';
                }
            });
        });
    </script>
 
   


</head>
<body>
    


  
   
   <h1 class="dashboard-heading">Food Palace Admin Dashboard</h1>
    <div class="menu-button-container left">
    <a href="index.html" class="menu-button" id="menuButton">☰ Menu</a>
    </div>
    
    <div class="menu-button-container right">
        <a href="#" class="menu-button" id="menuButton">
        <div class="edit-menu-options" id="editMenuOptions">
            <label for="edit-menu-select"></label>
            <select id="edit-menu-select">
                <option value="add">Add Menu</option> 
                <option value="add">Edit Menu</option> 
            </select>
        </a>

         
          


</div>
    <div class="menu-button-container right">
        
        <a href="waiterreg.html" class="menu-button" id="registerwaiterButton">Register Waiter</a>
       <!-- <a href="waiterunreg.html" class="unregisterButton" id="unregisterButton">Unregister Waiter</a> -->
    
    </div>
    </div>
    
    <div class="container">
          
        <div class="waiters-orders-container">
        <div class="right-section"> 
            
    
        <div class="waiters">
            <h2>Logged-in Waiters</h2>
            <ul id="waiter-list">
                <?php
                
                    // Retrieve waiter IDs where login_status is 'logged in'
                    $waiterQuery = "SELECT waiter_id FROM waiter WHERE login_status = 'logged in'";
                    $result = mysqli_query($conn, $waiterQuery);

                    // Check if there are any logged-in waiters
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Display the waiter ID in the list
                            echo "<li>{$row['waiter_id']}</li>";
                        }
                    } else {
                        echo "<li>No logged-in waiters</li>";
                    }
                ?>
        </ul>
    </div>
            </div>
        </div>
      

        <div class="waiters-orders-container">   
            <div class="left-section">     
                <div class="orders">
                <h2>Orders</h2>
                        <table id="order-table">
                           <!-- Table headers go here -->
                         <tbody></tbody>
                        </table>
                </div>
           </div>
        </div>
        <br/>
        <br/>
        <div class="assign-waiter-container">
            <h2>Assign Waiter</h2>
            <select id="waiter-select">
           <?php 
            $waiterQuery = "SELECT waiter_id FROM waiter WHERE login_status = 'logged in'";
            $result = mysqli_query($conn, $waiterQuery);

     
            if ($result->num_rows > 0) {
                // Output data as options for the select element
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row["waiter_id"]}'>{$row["waiter_id"]}</option>";
                }
            } else {
                echo "<option value=''>No logged-in waiters</option>";
            }
                ?>
            </select>

            <button id="assignWaiterBtn">Assign Waiter</button>
        </div>
    </div>
        <div class="main-content">
            
            <h2>Order Details</h2>
            <div id="order-details"></div>
        </div>
       
        <script>
    function DisableBackButton() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };
    }

    DisableBackButton();
</script>

    <div class="logout-container">
        <button onclick="window.location.href='logout1.php'" class="logout-btn">logout</button>
      
    </div>
    
</body>
</html>

