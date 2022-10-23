<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/header.css">
    <script src="../web/validateLogin.js"></script>
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
<!-- Login Form -->
<main>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="login">
        <form id="loginForm" method="post" action="" onsubmit="validate(event)">
            <label for="email">Email:
                <input type="text" name="email" value="">
            </label><br>
            <p id="errEmail" style="display: none; color: red">* Invalid email!</p>
            <label for="password">Password:
                <input type="password" name="password" value="">
            </label><br>
            <p id="errPass" style="display: none; color: red">* Password can't be empty!</p>
            <p id="noUser" style="display: none; color: red">* Invalid username or password!</p>
            <input type="submit" value="Login"><br>
            <p id="redirect"> You don't have a profile? <a href="register.php">Register Here</a></p>
        </form>
    </div>
</main>
</body>
