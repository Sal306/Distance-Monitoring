
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php
    echo $data;
    $data = $_POST["dist"];
    $file = "/frontend/temp.html";

    file_put_contents($file, $data);
    echo $data;
    $data = $_POST["dist"];

    echo $data;


    ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <?php
// this file will recieve the post request and send it to temp.html 
// the data will be formatted like that <div id='var'> , then from the temp.html. the data will be send to db  

file_put_contents($file, $data);
?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php
    $data = $_POST["dist"];

    echo $data;
    echo 'hey';
    ?>
</body>
</html>
<?php
file_put_contents($file, $data);
$data = $_POST["dist"];

echo $data;
$data = 'salih';
echo $data;
