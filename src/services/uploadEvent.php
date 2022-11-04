<?php

require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$data = array_values($_POST);
$img = $_FILES['image'];
$extension = str_contains($img['name'], '.jpg') || str_contains($img['name'], '.jpeg') || str_contains($img['name'], '.png');


if ($img['size'] > 600000 || !$extension) {
    header("HTTP/ 400");
} else {
    move_uploaded_file($img['tmp_name'], '../views/images/' . $img['name']);
    if(concertService->addNewConcert($data, 'images/' . $img['name'])){
        header("HTTP/ 200");
        header("Location: ../views/home.php");
    }else {
        header("HTTP/ 401");
    }

}


