<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Spots</title>
</head>
<body>

<?php
$area = $_POST['area']; 
?>

<h1>Available Parking Spots for <?php echo htmlspecialchars($area); ?></h1>

<?php
require ('config.php');

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=airparking", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $area = $_POST['area'];

$sql = "SELECT * FROM ParkingSpot WHERE area='$area'";
$result = $conn->query($sql);
$sql2 = "SELECT count(*) FROM ParkingSpot WHERE area='$area'";
$result2 = $conn->query($sql)->fetchColumn();
if ($result2 > 0) {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Spot Num</th>';
    echo '<th>Area</th>';
    echo '<th>Street</th>';
    echo '<th>Description</th>';
    echo '<th>Image</th>';
    echo '</tr>';
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["spot_id"] . "</td>";
        echo "<td>" . $row["area"] . "</td>";
        echo "<td>" . $row["street"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><img src='" . $row["img"] . "' alt='Image' width='100' height='100'></td>";
        echo "</tr>";
    }
    echo '</table>';
} else {
    echo "No records found.";
}
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