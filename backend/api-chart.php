<?php

// This file will send a josn array to chart.html 
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

define('TITLE', 'Report');

require_once('db_connect.php');

//array to hold the returned values from the DB
$return_arr = array();


//query the avg distance of the all data whose date is before one week
$result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week1'");

if (!$result){
  http_response_code(501);
}
while ($row = $result->fetch()) {
  $week1 = $row['avg'];
}


//query the avg distance of the all data whose date is before two week 
$result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week2'");
if (!$result){
  http_response_code(501);
}
while ($row = $result->fetch()) {
    $week2 = $row['avg'];
  }


//query the avg distance of the all data whose date is before three weeks
  $result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week3'");

if (!$result){
  http_response_code(501);
}
while ($row = $result->fetch()) {
    $week3 = $row['avg'];
  }

  
//query the avg distance of the all data whose date is before 4 weeks
  $result = $db->query("select AVG(distance) from (select distance, case
when date > now() - interval '1 week'  then 'week1' 
when date > now() - interval '2 week' then 'week2'
when date > now() - interval '3 week' then 'week3' 
when date > now() - interval '4 week' then 'week4' 
end
from report ) as A where A.case ='week4'");

if (!$result){
  http_response_code(501);
}
while ($row = $result->fetch()) {
    $week4 = $row['avg'];


    // return array to chart.html
    $return_arr[] = array( 
        "bar1" => $week1/100,
        "bar2" => $week2/100,
        "bar3" => $week3/100,
        "bar4" => $week4/100
        
    ); }
  
 

//return the json encoded values
echo json_encode($return_arr);
http_response_code(201);
