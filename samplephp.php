<?php

    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");

    
    echo $_POST["Username"];
    $query = "insert into user_info values('$_POST[Username]','$_POST[email]', '$_POST[password]')";
    $query = pg_query($query);
    
    if($query)
    {
      echo "inserted successfully!<br>";
      $name = preg_replace('/\s/', '_', $_POST["Username"]);
      $query = "CREATE TABLE ". $name ." (name varchar(30) PRIMARY KEY NOT NULL, bought_on DATE NOT NULL, volume numeric, bought_for numeric );";

      echo $query;

      if (pg_query($query)) {
          echo "table created hoorah";
      } else {
          echo "OH NO!";
      }
      pg_close($db);
      header('location: login_page.php');
      exit;
     }
    else{
      echo "There was an error! ".pg_last_error();
      pg_close($db);
    }
    
?>