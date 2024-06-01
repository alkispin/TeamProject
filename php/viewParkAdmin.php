<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Spots</title>
</head>
<body>
    <h1>Parking Spot List</h1>

<?php

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

    


    // Handle Update Operation
    if(isset($_POST['update'])){
        $spot_id = $_POST['spot_id'];
        $area = $_POST["area"];
        $street = $_POST["street"];
        $description = $_POST["description"];
        $img = $_POST["img"];

        $update_sql = "UPDATE ParkingSpot SET area='$area', street='$street', description='$description', img='$img' WHERE spot_id=$spot_id";

        if ($conn->query($update_sql) !== FALSE) {
            echo "Record updated successfully.<br><br>";
        } else {
            echo "Error updating record: ";
        }
    }

    // Handle Delete Operation
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $delete_sql = "DELETE FROM ParkingSpot WHERE spot_id=$id";

        if ($conn->query($delete_sql) !== FALSE) {
            echo "Record deleted successfully.<br><br>";
        } else {
            echo "Error deleting record: ";
        }
    }

    $sql = "SELECT * FROM ParkingSpot";
    $result = $conn->query($sql);
    $sql2 = "SELECT count(*) FROM ParkingSpot";
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
            echo '<td><a href="?edit=' . $row["spot_id"] . '">Edit</a></td>';
            echo '<td><a href="?delete=' . $row["spot_id"] . '">Delete</a></td>';
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "No records found";
    }
    ?>

    <h2>Edit Parking Spot</h2>
    <?php

    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        $sql = "SELECT * FROM ParkingSpot WHERE spot_id=$edit_id";
        $result = $conn->query($sql);
        $sql2 = "SELECT count(*) FROM ParkingSpot WHERE spot_id=$edit_id";
        $result2 = $conn->query($sql)->fetchColumn();
        if ($result2 > 0) {
            $row = $result->fetch();
            echo '<form method="post">';
            echo 'Area: <select id="area" name="area" required>
            <option value="" disabled selected>Select An Area</option>
            <option value="Evosmos">Evosmos</option>
            <option value="Thessaloniki">Thessaloniki</option>
            <option value="Kalamaria">Kalamaria</option></select><br>';
            echo 'Street: <input type="text" name="street" value="' . $row["street"] . '" required><br>';
            echo 'Description: <input type="text" name="description" value="' . $row["description"] . '" required><br>';
            echo 'Image: <input type="file" name="img" value="' . $row["img"] . '"><br>';
            echo '<input type="hidden" name="spot_id" value="' . $row["spot_id"] . '">';
            echo '<input type="submit" name="update" value="Update">';
            echo '</form>';
        }
    }
    ?>
    <p></p>
    <a href="AdminIndex.php">
    <button>Return to Website</button>
    </a>
</body>
</html>
