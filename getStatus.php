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
    echo "\\gamename\\projectigi2r\\gamever\\1.2\\location\\0\\hostname\\Polski Serwer IGI2 [igi2.xaa.pl]\\hostport\\26001\\mapname\\Sandstorm\\gametype\\Team match\\numplayers\\8\\maxplayers\\12\\gamemode\\openplaying\\bwidth\\0\\maxout\\300.0\\uptime\\775\\timeleft\\10:01\\mapstat\\    \\timelimit\\0\\autobalance\\0\\teamdamage\\0\\sniper\\1\\bombrepos\\0\\specmode\\1\\pingmax\\400\\plossmax\\15.0\\bwidth\\0\\maxout\\300.0\\dedicated\\1\\password\\0\\team_t0\\IGI\\team_t1\\CON\\score_t0\\4\\score_t1\\47\\player_24\\OLD Brisk\\frags_24\\2\\deaths_24\\0\\ping_24\\36\\team_24\\0\\player_29\\OLD APOLLO\\frags_29\\3\\deaths_29\\9\\ping_29\\30\\team_29\\1\\player_28\\slo\\frags_28\\9\\deaths_28\\6\\ping_28\\136\\team_28\\0\\player_26\\Captain Sam (CS)\\frags_26\\1\\deaths_26\\6\\ping_26\\234\\team_26\\1\\player_31\\Jones ZoMbiE\\frags_31\\9\\deaths_31\\7\\ping_31\\259\\team_31\\0\\player_33\\Vladutzw\\frags_33\\4\\deaths_33\\2\\ping_33\\221\\team_33\\1\\player_30\\+[sRdz]++[gAgArOt]+\\frags_30\\0\\deaths_30\\1\\ping_30\\326\\team_30\\0\\player_14\\*brooke* \\frags_14\\2\\deaths_14\\0\\ping_14\\300\\team_14\\1\\final\\\\queryid\\17515.1";
}

