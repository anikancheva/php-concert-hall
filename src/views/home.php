<?php
session_start();
$loggedIn = $_SESSION['user'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/header.css">
    <script src="../web/homeView.js" onload="getAll(<?= $loggedIn ?>)"></script>
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
    <div id="headlines">
        <p id="hdl1">All your favourite artists in one place</p>
        <p id="hdl2">Find your next event here!</p>
    </div>
    <button id="addBtn" onclick="addView()" style="display: none">Add new event</button>
    <!-- Events List -->
    <div class="events">
        <ul id="dashboard"></ul>
    </div>
    <p id="prompt">If you want to see more: <a href="login.php">login</a> or <a href="register.php">register</a></p>

</main>
</body>