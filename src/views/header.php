<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Concert Hall</title>
</head>
<?php

$logged = isset($_SESSION['user']);

$userNav = '<li class="user"><a href="../src/views/home.php">Profile</a></li>
            <li class="user"><a href="../../src/services/logout.php">Logout</a></li>';
$guestNav = '<li class="guest"><a href="src/views/login.php">Login</a></li>
            <li class="guest"><a href="src/views/register.php">Register</a></li>';

?>
<style>
    body{
        background: linear-gradient(90deg, #FFC87C 0%, #FD6E11 100%);
    }

    header{

    }

    .menu li {
        display: inline-block;
        margin: 5pt;
        padding: 5pt 5pt;
        font-size: 15pt;
        border-radius: 5pt;
        background: radial-gradient(#FFD2AC 0%, #f8e5d8 100%);
    }

    a{
        text-decoration: none;
        color: #f66200;
        margin: 10pt;

    }

    .logo{
        display: block;
        float: left;
        padding-right: 400pt;
    }
</style>
<header>
    <!-- Navigation -->
    <nav class="menu">
        <a class="logo" href="/home"><img src="" height="50" alt="logopic"></a>
        <ul>
            <?php if ($logged) {
                echo $userNav;
            } else {
                echo $guestNav;
            }
            ?>
        </ul>
    </nav>
</header>