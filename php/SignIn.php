<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body></body>


<?php
require ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_array($result);

        if(is_array($row)){
            $_SESSION["username"] = $row ["username"];
            $_SESSION["password"] = $row ["password"];

            if (strcasecmp($_SESSION["username"], "admin") == 0) {
                header("Location: AdminIndex.php");
                exit();
        }
        else{
            echo "<script> alert('Wrong Username or Password.'); </script>";       
        }
    }
    if(isset($_SESSION["username"])){
        header("Location: index.php");
    } 
}

?> 

<p></p>
<a href="../index.html">
<button>Return to Website</button>
</a>
</body>
</html>