<?php 
	session_start();
	$host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    echo $_SESSION["user_name"];
    pg_close($db);
?>