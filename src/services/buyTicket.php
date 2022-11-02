<?php

session_start();
require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$_POST = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['user'])){
    $userId=$_SESSION['user'];
    if($userId==='admin'){
        $userId=1;
    }
    $artist= $_POST['name'];

    try {
        userService->buyTicket($userId, $artist);
        header('HTTP/ 200');
    }catch (PDOException $e){
        header('HTTP/ 400');
    }

}else {
    header('HTTP/ 401');
}
