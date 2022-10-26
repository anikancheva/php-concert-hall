<?php
session_start();

$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <script src="../web/validateRegister.js"></script>
    <title>Concert Hall</title>
</head>
<body>
<header>
    <!-- Navigation -->
    <div class="navbar">
        <a href="home.php">Dashboard</a>
        <div class="right-nav">
            <a id="greeting">Hello, <?=$user?>!</a>
            <a href="profile.php">Profile</a>
            <a href="../services/logout.php">Logout</a>
        </div>
    </div>
</header>
<!-- User Profile -->
<div class="user-events">
    <p>My events:</p>
    <ul>
        <li>user event 1</li>
        <li>user event 2</li>
    </ul>
</div>
<div>
    <button id="editProfile" style="background-color: rgb(203, 203, 248);">Edit Profile</button>
</div>
