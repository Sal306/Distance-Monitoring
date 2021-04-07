<?php
$time = time();
$temp = $_POST["temp"];
$file = "temp.html";
$data = $time . "  -  " . $temp;
file_put_contents($file, $data);
 ?>
