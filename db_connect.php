<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $conn = pg_connect(getenv("postgres://fqlsipmoauptdn:aeaf5065cafd4422a1c9c8f086c362906c2275f6d4e1f9f45b1082a7b8643fe9@ec2-107-22-245-82.compute-1.amazonaws.com:5432/dcqeloql3v0p9s"));


    if($conn){
      echo "Connected ";
    }
    else {
      echo "Error";
    }

    // $res = pg_insert($conn, 'capstone', $_POST, PG_DML_ESCAPE);
    //
    //   if ($res) {
    //       echo "POST data is successfully logged\n";
    //   } else {
    //       echo "User must have sent wrong inputs\n";
    //   }
     ?>

  </body>
</html>
