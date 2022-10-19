<?php
$host="/php-concert-hall";
$uri=$_SERVER["REQUEST_URI"];

$requested=str_replace($host, "", $uri);

switch ($requested){
    case "/":
    case "/home":
        require "src/views/home.php";
        break;
    case "/login":
        require "src/services/login.php";
        break;
    case "/login-form":
        require "src/views/login.php";
        break;
    case "/register":
        require "src/services/register.php";
        break;
    case "/register-form":
        require "src/views/register.php";
        break;
    case "/logout":
        require "src/services/logout.php";
        break;

}