<?php

$version = $_POST['version'];

$conn = new mysqli("localhost", "root", "XedeX160!", "igi2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM version  ORDER BY date DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row['version'] != $version ){
        echo "Please update MLauncher!";
    } else {
        echo "MLauncher is current!";
    }
} else {
        echo "MLauncher is current!";
}

