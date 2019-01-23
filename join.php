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
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO ipUsers (id_user, ip, date) "
            . "VALUES ('$id', '$ip', '" . date("Y-m-d H:i:s") . "');";
    $result = $conn->query($sql);
    
    $sql = "UPDATE user SET status='2', ip='$ip' WHERE email LIKE '$email' AND password LIKE '$pass'";
    $result = $conn->query($sql);
    
    
    
    $var = false;
    $sql = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$pass'";
    $result = $conn->query($sql);
    echo "JOIN!";
    return;
}

