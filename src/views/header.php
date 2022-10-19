<?php
session_start();
$logged = isset($_SESSION['user']);

$userNav = '<li class="user"><a href="/">Profile</a></li>
            <li class="user"><a href="logout">Logout</a></li>';
$guestNav = '<li class="guest"><a href="login-form">Login</a></li>
            <li class="guest"><a href="register-form">Register</a></li>';

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
        <a class="logo" href="home"><img src="" height="50" alt="logopic"></a>
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