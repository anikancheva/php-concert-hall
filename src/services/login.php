<?php
session_start();
require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$_POST = json_decode(file_get_contents("php://input"), true);
var_dump($_POST);

$email = $_POST["email"];
$password = $_POST["password"];

/** @var \src\services\UserService userService */

$result = userService->login($email, $password);


if ($result) {
    $_SESSION['user'] = $result->getId();
    header("HTTP/ 200");
} else {
    header("HTTP/ 400");
}
