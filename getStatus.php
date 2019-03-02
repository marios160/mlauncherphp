<?php

$email = $_POST['email'];
$pass = $_POST['word'];

if (empty($email) || empty($pass)) {

    echo "Wrong email or password!";
    return;
}

$conn = new mysqli("localhost", "root", "XedeX160!", "igi2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "SELECT status FROM status;";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['status'];
} else {

    echo "Wrong email or password!";
}

