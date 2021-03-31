<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Header: Acess-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);
//getting the values of the decoded json
$fav = $data["fav"];
$id = $data['id'];

//DB connection
require_once('db_connect.php');

$result = $db->prepare("UPDATE report SET fav='" . $fav . "' where id='" . $id ."' FROM report");

$result->execute();


if ($stmt->rowCount()) {
    echo json_encode(array("message" => $stmt->rowCount() . " records UPDATED successfully"));
    http_response_code(201);
} else {
    echo json_encode(array("message" => "failed to update your data"));
    http_response_code(500);
}
