
<?php
    $data = $_POST["dist"];
    $file = '/frontend/temp.html';

    file_put_contents($file, $data);
  

    ?>
