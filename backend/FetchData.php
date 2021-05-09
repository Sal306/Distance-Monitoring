
<?php

    $data = $_POST["dist"];
    $file = 'temp.html';    
    file_put_contents($file, $data);
    $newcontent = file_get_contents("temp.html");
    echo $newcontent;
    ?>

