
<?php

    $data = $_POST["dist"];
    $file = 'temp.html';    
    file_put_contents($file, $data);
    sleep(5);
    $newcontent = file_get_contents("temp.html");
    sleep(1);
    echo $newcontent;
    ?>

