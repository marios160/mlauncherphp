<?php

$email = $_POST['email'];
$pass = $_POST['word'];
$cdk = $_POST['cdk'];

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
    if($row['status'] == 99 ){
        echo 'Banned!';
        return;
    }
    if ($row['activated'] == 1) {
        if ($row['cdkey'] == $cdk) {
            echo "nick=" . $row['nick'] . "=kcin";
        } else {
            echo "cdk=" . $row['raw_cdkey'];
        }
    } else {
        echo "Not activated!";
    }
} else {
    echo "Wrong email or password!";
    return;
}
