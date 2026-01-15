<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $supporter_name = isset($_POST['supporter_name']) ? $_POST['supporter_name'] : '';
    $email          = isset($_POST['email']) ? $_POST['email'] : '';
    $package_id     = isset($_POST['package_id']) ? $_POST['package_id'] : '';
    $quantity       = isset($_POST['quantity']) ? $_POST['quantity'] : '';

    if ($supporter_name && $email && $package_id && $quantity) {
        $supporter_name = $conn->real_escape_string($supporter_name);
        $email          = $conn->real_escape_string($email);
        $package_id     = (int)$package_id;
        $quantity       = (int)$quantity;

        $sql = "INSERT INTO sponsorships (supporter_name, email, package_id, quantity)
                VALUES ('$supporter_name', '$email', $package_id, $quantity)";

        if ($conn->query($sql) === TRUE) {
            $message = "Thank you, $supporter_name! Your sponsorship has been received.";
        } else {
            $message = "Error saving sponsorship: " . $conn->error;
        }
    } else {
        $message = "Please fill in all required fields.";
    }
} else {
    $message = "Invalid request.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsorship Confirmation - Birds of Paradise Sanctuary &amp; Rescue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
    <h1>Sponsorship Confirmation</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="parrots.html">Our Parrots</a>
        <a href="sponsor
