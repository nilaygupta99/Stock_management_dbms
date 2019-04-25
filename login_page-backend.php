<?php
    session_start();
    
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    $query1 = "select password from user_info where name ='$_POST[name1]'";
    $l = pg_query($query1);
    $m = pg_fetch_row($l)[0];
    pg_close($db);

    if($_POST["password1"] == $m)
    {
        echo "logged in successfully!!!";
        $_SESSION['user_name'] = $_POST["name1"];
        header('location: portfolio.php');
        exit;
    }
    else{
        echo "password is wrong";
        $_SESSION['wrong_pass'] = 1;
        // header('location: login_page.html');
        // exit;
     }
    //echo $_POST["name1"].$_POST["password1"];
     
?>