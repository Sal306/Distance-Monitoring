<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();

//query to return the values
$result = $db->query("select * from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case !='null'");

while ($row = $result->fetch()) {
  $id = $row['id'];
  $case = $row['case'];
  
    $return_arr[] = array( 
      "id" => $id,
      "case" => $case
  );
}

//return the json encoded values
echo json_encode($return_arr);