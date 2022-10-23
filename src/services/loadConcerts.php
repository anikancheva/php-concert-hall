<?php

require_once "C:\Program Files\Apache24\htdocs\php-concert-hall\ini.php";
header("Content-Type: application/json", true, 200);
echo json_encode(concertService->getAllConcerts());
?>
