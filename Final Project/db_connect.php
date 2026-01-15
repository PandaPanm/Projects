<?php
// lets set up that database baby!
$host = "sql100.infinityfree.com";
$user = "if0_40620870";
$pass = "m9kNdqBPouX";
$db   = "if0_40620870_birdsofparadise";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
