<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();


  $result = $db->query("select date, temp, distance, humidity  from 
report where fav ='true'");

while ($row = $result->fetch()) {
    $date = $row['date'];
    $dist = $row['distance'];
    $hum = $row['humidity'];
    $temp = $row['temp'];



    $return_arr[] = array( 
        "date" => $date,
        "dist" => $dist,
        "hum" => $hum,
        "temp" => $temp
        
    ); }
  
 

//return the json encoded values
echo json_encode($return_arr);