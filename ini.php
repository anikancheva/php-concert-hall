<?php

spl_autoload_register(function ($class) {
    include $class .'.php';
});

use src\repositories\ConcertRepository;
use src\repositories\UserRepository;
use src\services\ConcertService;
use src\services\UserService;

require_once "src\db_data\pdo_ini.php";

const userRepo = new UserRepository(pdo);
const concertRepo=new ConcertRepository(pdo);
const userService=new UserService(userRepo, concertRepo);
const concertService=new ConcertService(concertRepo);
