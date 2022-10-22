<?php
session_start();
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
    <nav class="menu">
        <ul>
            <li><a href="">Dashboard</a></li>
            <?php if ( isset($_SESSION['user'])) {
                echo '<li class="user"><a href="profile.php">Profile</a></li>
                        <li class="user"><a href="../services/logout.php">Logout</a></li>';
            } else {
                echo '<li class="guest"><a href="login.php">Login</a></li>
                         <li class="guest"><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<!-- User Profile -->
<p>Hello, !</p>
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
