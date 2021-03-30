
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

      $sqlList = 'CREATE TABLE IF NOT EXISTS stocks (
                        id serial PRIMARY KEY,
                        symbol character varying(10) NOT NULL UNIQUE,
                        company character varying(255) NOT NULL UNIQUE
                     );';

      $db->exec($sqlList); 

      }




    else {
      echo "Error";
    }


     ?>
