<?php

// This page will send the rows where fav=true to favorite.html
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();


  $result = $db->query("select id, date, temp, distance, humidity, fav  from 
report where fav ='true'");

while ($row = $result->fetch()) {
    $id = $row['id'];
    $date = $row['date'];
    $dist = $row['distance'];
    $hum = $row['humidity'];
    $temp = $row['temp'];
    $fav = $row['fav'];



    $return_arr[] = array( 
        "id"   => $id,
        "date" => $date,
        "dist" => $dist,
        "hum" => $hum,
        "temp" => $temp,
        "fav" => $fav
        
    ); }
  
 

//return the json encoded values
echo json_encode($return_arr);