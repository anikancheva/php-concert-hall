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
    <title>Concert Hall-Login</title>
</head>
<body>
<header>
    <!-- Navigation -->
    <div class="navbar">
        <a href="home.php">Back</a>
    </div>
</header>
<!-- Login Form -->
<main>
    <div class="background"></div>
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
            <p id="redirect"> You don't have a profile? <a href="register.php">Register here</a></p>
        </form>
    </div>
</main>
</body>
