<?php
$time = time();
$distance = $_POST["dist"];
$temp = $_POST["temp"];
$humidity = $_POST["hum"];


$data = $time . " - " . $distance .  " - " . $temp    . " - " . $humidity;

echo $data;
$file = "temp.html";

file_put_contents($file, $data);

// Insert data to db

 ?>
