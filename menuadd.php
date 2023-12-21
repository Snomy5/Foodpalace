<?php
            include("coonection.php");
            if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {

                // Collect form data
                $itemid = $_POST['itemid'];
                $itemname = $_POST['itemname'];
                $itemdescription = $_POST['itemdescription'];
                $price = $_POST['price'];
                $itemcategory = $_POST['itemcategory'];

                // Insert data into the item_c table
                $insertSql = "INSERT INTO item_c (item_id, item_name, item_description, item_price, item_category) 
                            VALUES ('$itemid', '$itemname', '$itemdescription', '$price', '$itemcategory')";

                if (mysqli_query($conn, $insertSql)) {
                    echo "Item added successfully!";
                } else {
                    echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
                }
            }
        ?>