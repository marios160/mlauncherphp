<?php
error_reporting(E_ALL);
sendMail("marios160@o2.pl", "asd");

return;
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