
<?php
$count =0;

    $data = $_POST["dist"];
    if($file){
    $file = 'temp.html';
    $count++;
    }
    if($count==0){
    file_put_contents($file, $data);
    }


    ?>
