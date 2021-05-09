<?php
//the headers of the http request
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Header: Acess-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization");

//decoding the values
$data = json_decode(file_get_contents("php://input"), true);

//catching the decoded values
$hum = $data['hum'];
$temp = $data['temp'];
$date = $data['date'];
$dist = $data['dist'];


//DB connection
require_once('db_connect.php');


//query to insert the data into the DB
$result = $db->prepare("INSERT INTO report (temp, distance, humidity, date) VALUES(:temp , :dist, :hum, :date)");
$result->bindValue(':temp', $temp);
$result->bindValue(':dist', $dist);
$result->bindValue(':hum', $hum);
$result->bindValue(':date', $date);

$result->execute();


if ($result->rowCount()) {
    echo json_encode(array("message" => $result->rowCount() . " records Inserted  successfully"));
    http_response_code(201);
} else {
    echo json_encode(array("message" => "failed to Insert your data"));
    http_response_code(500);
}