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
$sql = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $nick = $row['nick'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO ipUsers (id_user, ip, date, nick) "
            . "VALUES ('$id', '$ip', '" . date("Y-m-d H:i:s") . "','$nick' );";
    $result = $conn->query($sql);

}
    