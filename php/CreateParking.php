<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Spots</title>
</head>
<body>

<?php
require ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_connect("localhost","root","","airparking");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


        $area = $_POST["area"];
        $street = $_POST["street"];
        $description = $_POST["description"];
        $img = $_POST["img"];

        $sql = "INSERT INTO ParkingSpot (area, street, description, img) VALUES ('$area', '$street', '$description', '$img')";
        
        if ($conn->query($sql) !== FALSE) {
            echo "Parking Spot was created successfuly.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
} 
else {
    echo "Form not submitted.";
}


if (strcasecmp($_SESSION["username"], "admin") == 0) {
    $url = "AdminIndex.php";
} else {
    $url = "index.php";
}
?>

<a href="<?php echo $url; ?>">
    <button>Return to Website</button>
</a>
</body>
</html>
