
<?php

    $data = $_POST["dist"];
    $file = 'temp.html';    
    file_put_contents($file, $data);
    sleep(5);
    $newcontent = file_get_contents("temp.html");
    sleep(1);
    echo $newcontent;
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function() {
  alert('hi');
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