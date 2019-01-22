<?php
require_once "Mail.php";
error_reporting(E_ALL);
$email = $_POST['email'];
$pass = $_POST['word'];
$cdk = $_POST['cdk'];
$rawcdk = $_POST['rawcdk'];
if (empty($email) || empty($pass)) {
    return;
}
$conn = new mysqli("localhost", "root", "XedeX160!", "igi2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email LIKE '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        echo "User '$email' already exist!";
} else {
    $sql = "SELECT * FROM user WHERE cdkey LIKE '$cdk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "CDK is alredy in use!";
    } else {
        $sql = "INSERT INTO user (email, cdkey, raw_cdkey, register_data, password, nick, activated, status) "
                . "VALUES ('$email', '$cdk','$rawcdk', '" . date("Y-m-d H:i:s") . "', '$pass','MJones', '0', '0');";
        $result = $conn->query($sql);

        if (empty($conn->error)) {
            $userId = mysqli_insert_id($conn); 
            $haslo = generateRandomString();
            $sql = "INSERT INTO activatedCode (id_user, code) "
                . "VALUES ('$userId', '$haslo');";
            $result = $conn->query($sql);
            sendMail($email,$haslo);
            echo "User created!";
        } else {
            echo $conn->error;
        }
    }
}

$conn->close();



function generateRandomString($length = 6) {
    $characters = '123456789ABCDEFGHJKMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendMail($email, $code){
    // Pear Mail Library


$from = '<igi2mlauncher@gmail.com>';
$to = "<$email>";
$subject = 'IGI2 MLauncher - Activate code';
$body = "Here is your activate code: $code";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'igi2mlauncher@gmail.com',
        'password' => 'XedeX160!'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    return true;
}
}