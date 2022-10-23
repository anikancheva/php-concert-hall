<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/header.css">
    <script src="../web/loadConcerts.js" onload="getAll()"></script>
    <title>Concert Hall</title>
</head>
<body>
<header>
    <!-- Navigation -->
    <nav class="menu">
        <ul>
            <li><a href="home.php">Dashboard</a></li>
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
<main>
    <!-- Events List -->
    <div>
        <h1>All your favourite artists in one place!</h1>
        <p id="subline">Find your next event here...</p>
        <div class="events">
            <ul id="dashboard"></ul>
        </div>
    </div>
</main>
</body>