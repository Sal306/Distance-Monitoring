
<?php

    $data = $_POST["dist"];
    
    $file = 'temp.html';    
    file_put_contents($file, $data);
    sleep(1);
    $newcontent = file_get_contents("temp.html");
    echo $newcontent;
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

     // retrieve the values 
     if(document.getElementById('hum')){
   var hum = document.getElementById('hum').innerHTML; 
   var dist = document.getElementById('dist').innerHTML;
   var temp = document.getElementById('temp').innerHTML;
   var dateOnly = new Date();
   var date = dateOnly.getFullYear()+'/'+(dateOnly.getMonth()+1)+'/'+dateOnly.getDate(); 
   

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
                console.log('Recieved and inserted to DBs');
            },
            error: function(xhr, status, error) {
                alert("error");
            }
        };
        //sending the ajax
        $.ajax(options); }
</script>