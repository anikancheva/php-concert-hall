<?php
session_start();
require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";

$_POST = json_decode(file_get_contents("php://input"), true);
$name=$_POST['artist'];

concertService->removeByArtist($name);