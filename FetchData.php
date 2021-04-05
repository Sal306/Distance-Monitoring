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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
 <?php echo $data ?>
  </body>
</html>
