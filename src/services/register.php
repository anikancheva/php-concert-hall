<?php

use src\models\User;

require_once "ini.php";

$_POST = json_decode(file_get_contents('php://input'), true);

$fName = $_POST["first"];
$lName = $_POST["last"];
$email = $_POST["email"];
$password = $_POST["password"];

$user = new User($fName, $lName, $email, $password, "USER");

/** @var \src\services\UserService $userService */

$result=$userService->register($user);
if ($result) {
    $_SESSION['user']=$result->getId();
    header("Location: home");
} else {
    header("Location: register-form");
}

?>