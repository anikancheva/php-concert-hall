<?php
session_start();
spl_autoload_register();
use src\repositories\ConcertRepository;
use src\repositories\UserRepository;
use src\services\ConcertService;
use src\services\UserService;

require_once "src\db_data\pdo_ini.php";

$userRepo=new UserRepository(pdo);
$concertRepo=new ConcertRepository(pdo);

$userService=new UserService($userRepo, $concertRepo);
$concertService=new ConcertService($concertRepo);
