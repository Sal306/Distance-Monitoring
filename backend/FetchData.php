<?php
// this file will recieve the post request and send it to temp.html 
// the data will be formatted like that <div id='var'> , then from the temp.html. the data will be send to db  
$data = $_POST["dist"];


$file = "/frontend/temp.html";

file_put_contents($file, $data);


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <?php
 echo $data;
?>
 </body>
 </html>
