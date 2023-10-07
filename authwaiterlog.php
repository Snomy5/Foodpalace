<?php

    include("coonection.php");
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql = "select * from waiter where waiter_id  = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count==1)
        {
            echo   '<script>
                        window.location.href = "waiterdash.html";
                        alert("Login successfully")
                    </script>';
        }
        else
        {
            echo   '<script>
                        window.location.href = "waiterlog.html";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
    }
}
?>