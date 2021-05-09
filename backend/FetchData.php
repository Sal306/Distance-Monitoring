

 <?php
// this file will recieve the post request and send it to temp.html 
// the data will be formatted like that <div id='var'> , then from the temp.html. the data will be send to db  
$data = $_POST["dist"];


$file = "/frontend/temp.html";

file_put_contents($file, $data);
?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php
    echo $data;
    ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function() {
     // retrieve the values 
   let hum = document.getElementById('hum'); 
   let dist = document.getElementById('dist');
   let temp = document.getElementById('temp');
    
   hum = hum.innerHTML;
   dist = dist.innerHTML;
   temp = temp.innerHTML;
   
  
   var date = new Date(dateTime. getTime());
   date.setHours(0, 0, 0, 0);
   

   obj = {
     'hum': hum, 
     'dist': dist,
     'temp' : temp,
     'date' : date
   };
   var json = JSON.stringify(obj);
        //passing the values using ajax
        var options = {
            url: "/backend/insert_db.php",
            dataType: "json",
            type: "POST",
            data: json,

            success: function(xhr, status, error) {
                alert(success);
            },
            error: function(xhr, status, error) {
                alert("error");
            }
        };
        //sending the ajax
        $.ajax(options);
      });

</script>