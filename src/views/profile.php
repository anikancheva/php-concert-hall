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
    <link rel="stylesheet" href="styles/profile.css">
    <script src="../web/profileService.js" onload="getConcerts()"></script>
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
<div id="user-events">
    <p id="my-events-hdln">My upcoming events:</p>
    <p id="noEvents" style="display: none">You don't have any events yet...</p>
</div>
<div>
    <button id="edit" onclick="editView()">Edit Profile</button>
</div>
