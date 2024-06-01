<?php
session_start();
$conn = mysqli_connect("localhost","root","","airparking");


  if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
  }

?>
