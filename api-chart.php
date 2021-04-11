<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();

//query to return the values
$result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week1'");


while ($row = $result->fetch()) {
  $week1 = $row['avg'];
}

$result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week2'");

while ($row = $result->fetch()) {
    $week2 = $row['avg'];
  }


  $result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week3'");

while ($row = $result->fetch()) {
    $week3 = $row['avg'];
  }

  $result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week4'");

while ($row = $result->fetch()) {
    $week4 = $row['avg'];


    $return_arr[] = array( 
        "bar1" => $week1,
        "bar2" => $week2,
        "bar3" => $week3,
        "bar4" => $week4
        
    ); }
  
 

//return the json encoded values
echo json_encode($return_arr);