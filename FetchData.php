<?php
$time = time();
$distance = $_POST["dist"];
$temp = $_POST["temp"];
$humidity = $_POST["hum"];


$data = $time . " - " . $distance .  " - " . $temp    . " - " . $humidity;

$file = "temp.html";


// Insert data to db

 ?>
