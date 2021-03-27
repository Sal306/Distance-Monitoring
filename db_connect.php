
    <?php

    // $conn = pg_connect(getenv("postgres://fqlsipmoauptdn:aeaf5065cafd4422a1c9c8f086c362906c2275f6d4e1f9f45b1082a7b8643fe9@ec2-107-22-245-82.compute-1.amazonaws.com:5432/dcqeloql3v0p9s"));
    $dsn = "pgsql:"
    . "host=ec2-107-22-245-82.compute-1.amazonaws.com;"
    . "dbname=dcqeloql3v0p9s;"
    . "user=fqlsipmoauptdn;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=aeaf5065cafd4422a1c9c8f086c362906c2275f6d4e1f9f45b1082a7b8643fe9";

$db = new PDO($dsn);
    if($db){
      http_response_code(501);
    }
    else {
      echo "Error";
    }

    // $res = pg_insert($conn, 'capstone', $_POST, PG_DML_ESCAPE);
    //

     ?>
