
<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');
ob_start();
require('FetchData.php');
ob_end_clean();
//array to hold the returned values from the DB
$return_arr = array();

//query to return the values
$result = $db->query("SELECT id, distance, humidity, temp, fav, date FROM report ORDER BY date desc ");


if(!$result){
  http_response_code(501);
}
while ($row = $result->fetch()) {
  $id = $row['id'];
  $distance = $row['distance'];
  $humidity = $row['humidity'];
  $temp = $row['temp'];
  $fav = $row['fav'];
  $date = $row['date'];

    $return_arr[] = array( 
      "id" => $id,
      "distance" => $distance,
      "humidity" => $humidity,
      "temp" => $temp,
      "fav" => $fav, 
      'date' => $date
  );
}

//return the json encoded values
echo json_encode($return_arr);
http_response_code(201);
