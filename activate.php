<?php

$code = $_POST['activatedCode'];
$email = $_POST['email'];
if (empty($code) || empty($email)) {
    echo "Wrong code!";
    return;
}

$conn = new mysqli("localhost", "root", "XedeX160!", "igi2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM activatedCode INNER JOIN user ON activatedCode.id_user=user.id WHERE user.email LIKE '$email' ORDER BY user.id DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "Error!";
}
$row = mysqli_fetch_assoc($result);
if(strcmp($row['code'],$code) == 0){
    $idUser = $row['id_user'];
    $sql = "DELETE FROM activatedCode WHERE id_user='$idUser'";
    $result = $conn->query($sql);
    $sql = "UPDATE user SET activated='1' WHERE id='$idUser'";
    $result = $conn->query($sql);
    echo 'Activated!';
    
} else{
    echo 'Wrong code!';
}