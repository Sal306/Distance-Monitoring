<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $conn = pg_connect(getenv("postgres://viyzxonpnmgcit:42e476a1e406d20a3f33c8a01d0b15de8e77c5e37d4b50a9a788d4a7161c6c4d@ec2-52-1-115-6.compute-1.amazonaws.com:5432/d30juj5p9l7hdh"));

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
