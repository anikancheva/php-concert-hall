<?php
require_once "ini.php";


$_POST = json_decode(file_get_contents('php://input'), true);

$email = $_POST["email"];
$pass = $_POST["password"];


/** @var \src\services\UserService $userService */

$result=$userService->login($email, $pass);
if ($result) {
    $_SESSION['user']=$result->getId();
    header("Location: home");
}else {
    header("Location: login-form");
}

