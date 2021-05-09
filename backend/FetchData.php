
<?php
$count =0;

    $data = $_POST["dist"];
    if($file){
    $file = 'temp.html';
    }
    file_put_contents($file, $data);



    ?>
