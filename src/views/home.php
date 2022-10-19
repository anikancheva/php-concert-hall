<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Concert Hall</title>
</head>
<body>
<?php
require_once "header.php";
echo $_SESSION['user'];
?>
<main>
    <!-- Events List -->
    <div>
        <h1>All your favourite artists in one place!</h1>
        <p>Find your next event here...</p>
        <div class="events">
            <ul>
                <li>concert 1 info</li>
                <li>concert 2 info</li>
                <li>concert 3 info</li>
            </ul>
        </div>
    </div>
</main>
</body>
</html>