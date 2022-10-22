<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
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
<!-- Register Form -->
<main>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="register">
    <form id="regForm" action="" method="post" onsubmit="validate(event)">
        <label for="firstName">First Name:
            <input type="text" name="firstName" value="">
        </label><br>
        <p id="errFirst" style="display: none; color: red">* Name can't be empty!</p>
        <label for="lastName">Last Name:
            <input type="text" name="lastName" value="">
        </label><br>
        <p id="errLast" style="display: none; color: red">* Name can't be empty!</p>
        <label for="email">Email:
            <input type="text" name="email" value="">
        </label><br>
        <p id="errEmail" style="display: none; color: red">* Invalid email!</p>
        <label for="password">Password:
            <input type="password" name="password" value="">
        </label><br>
        <p id="errPass" style="display: none; color: red">* Password can't be empty!</p>
        <label for="conf-pass">Confirm Password:
            <input type="password" name="conf-pass" value="">
        </label><br>
        <p id="errConfPass" style="display: none; color: red">* Passwords don't match!</p>
        <input type="submit" value="Register">
    </form>
</div>
</main>
</body>
<!-- TODO add JS validation -->
