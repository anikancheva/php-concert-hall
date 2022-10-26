<?php
session_start();
$loggedIn = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/header.css">
    <script src="../web/loadConcerts.js" onload="getAll(<?=$loggedIn?>)"></script>
    <title>Concert Hall</title>
</head>
<body>
<header>
    <!-- Navigation -->
    <div class="navbar">
        <a href="home.php">Dashboard</a>
        <div class="right-nav">
            <?php if ($loggedIn) {
                echo '<a id="greeting">Hello, ' . $_SESSION['username'] . '!</a>
                        <a href="profile.php">Profile</a>
                        <a href="../services/logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>
                    <a href="register.php">Register</a>';
            }
            ?>
        </div>
    </div>
</header>
<main>
    <!-- Events List -->
    <div>
        <p id="headline">All your favourite artists in one place</p>
        <p id="headline2">Find your next event here!</p>
        <div class="events">
            <ul id="dashboard"></ul>
        </div>
        <p id="prompt">If you want to see more: <a href="login.php">login</a> or <a href="register.php">register</a></p>
    </div>
</main>
</body>