<?php
require_once "ini.php";

$_POST = json_decode(file_get_contents("php://input"), true);
var_dump($_POST);


$email = $_POST["email"];
$password = $_POST["password"];


/** @var \src\services\UserService $userService */

$result=$userService->login($email, $password);
var_dump($result);
if ($result) {
    $_SESSION['user']=$result->getId();
    header("Location: home");
}else {
    header("Location: login-form");
}

