<?php

session_start();

require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$_POST = json_decode(file_get_contents('php://input'), true);

$id= $_SESSION['user'];
if($id === 'admin'){
    $id=1;
}
$fName = $_POST["first"];
$lName = $_POST["last"];
$password = $_POST["password"];

userService->updateUser($id, $fName, $lName, $password);
$_SESSION['username'] = $fName;