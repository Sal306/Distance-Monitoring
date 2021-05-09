
<?php

    $data = $_POST["dist"];
    $file = 'temp.html';    
    file_put_contents($file, $data);
    
    ?>

      var x = <?php $data ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
<script>
  alert('hi');
</script>
</html>