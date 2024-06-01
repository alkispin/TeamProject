<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
require ('config.php');

if(!empty($_SESSION["user_id"])){
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $sql = "INSERT INTO users (username, password) VALUES('$username','$password')";
            mysqli_query($conn, $sql);
            echo "<script> alert('Registration Successful'); </script>";
            header("Location: ../index.html");
        }
        else{
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}

?> 

<p></p>
<a href="../index.html">
<button>Return to Website</button>
</a>
</body>
</html>