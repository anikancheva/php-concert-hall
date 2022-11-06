<?php
session_start();
use src\models\User;

require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$_POST = json_decode(file_get_contents('php://input'), true);

$fName = $_POST["first"];
$lName = $_POST["last"];
$email = $_POST["email"];
$password = $_POST["password"];

$user = new User($fName, $lName, $email, $password, "USER");

/** @var \src\services\UserService $userService */

$result=userService->register($user);
if ($result) {
    $_SESSION['user']=$result->getId();
    $_SESSION['username'] = $result->getFirstName();
    header("HTTP/ 200");
} else {
    header("HTTP/ 400");
}
