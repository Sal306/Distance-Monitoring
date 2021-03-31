<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();

//query to return the values
$result = pg_query($db, "SELECT id, distance, location, temp FROM report");


while ($row = pg_fetch_row($result)) {
  $id = $row['id'];
  $distance = $row['distance'];
  $location = $row['location'];
  $temp = $row['temp'];


    $return_arr[] = array(
      "id" => $id,
      "distance" => $distance,
      "location" => $location,
      "temp" => $temp
  );
}

//return the json encoded values
echo json_encode($return_arr);
