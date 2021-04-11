<?php
// this file will recieve the post request and send it to temp.html 
// the data will be formatted like that <div id='var'> , then from the temp.html. the data will be send to db  
$data = $_POST["dist"];





$file = "temp.html";

file_put_contents($file, $data);


 ?>
