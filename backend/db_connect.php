
    <?php

    // This page will connect to the database and create a table in not exists
    // the method below didn't work, it was added in the report 
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

      $sqlList = 'CREATE TABLE IF NOT EXISTS report (
          id serial PRIMARY KEY,
          distance real not null,
          temp real not null,
          hum text not null,
          date date default now() ,
          fav boolean default False
          );';

      $db->exec($sqlList);

      }

    else {  
        http_response_code(501);    
    }

     ?>
