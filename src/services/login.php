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
    $isAdmin=$result->getRole()==='ADMIN';
    if($isAdmin){
        $_SESSION['user'] = 'admin';
        header("HTTP/ 200");
    }else {
        $_SESSION['user'] = $result->getId();
        $_SESSION['username'] = $result->getFirstName();
        header("HTTP/ 202");
    }

} else {
    header("HTTP/ 400");
}
