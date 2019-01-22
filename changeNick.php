<?php
$email = $_POST['email'];
$pass = $_POST['word'];
$nick = $_POST['nick'];

if (empty($email) || empty($pass) || empty($nick)) {
    echo "Wrong email or password!";
    return;
}

$conn = new mysqli("localhost", "root", "XedeX160!", "igi2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE user SET nick='$nick' WHERE email LIKE '$email' AND password LIKE '$pass'";
$result = $conn->query($sql);

if(empty($conn->error)){
    echo "Changed!";
} else {
    echo $conn->error;
}
    