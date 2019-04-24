<?php

    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");

    // $query_employee = "INSERT INTO employee VALUES ('$_POST[employee_id]', '$_POST[first_name]', '$_POST[last_name]',
    //                                         '$_POST[salary]' , '$_POST[gender]', '$_POST[phone]', 
    //                                         '$_POST[branch_id]', '$_POST[trainer]')";
    // $result_employee = pg_query($query_employee);
    // $employee_type = $_POST['trainer'];
    // if ($employee_type == 'Trainer'){
    //     $query_trainer = "INSERT INTO trainer VALUES ('$_POST[employee_id]',
    //                                                  '$_POST[dependent]', '$_POST[specialization]')";U
    //     $query_dependent = "INSERT INTO dependent VALUES ('$_POST[dependent]', '$_POST[employee_id]')";ame 
    //     $result_trainer = pg_query($query_trainer);
    //     $result_dependent = pg_query($query_dependent);
    // } else{
    //     $query_clerk = "INSERT INTO clerk VALUES ('$_POST[employee_id]', '$_POST[shift]')";
    //     $result_clerk = pg_query($query_clerk);
    // }
    // echo "Successfully Inserted";
    // echo "Successfully connected with database company";
    // $result = pg_query("select * from abb");
    // $myrow = pg_fetch_array($result);
    // // $myrow = pg_fetch_assoc($result); 
    // echo "<br>";
    // echo $myrow[0], " ", $myrow[1], " ", $myrow[2], " ", $myrow[3], " ", $myrow[4], "<br>";
    // echo "test"
    echo $_POST["Username"];
    // $x = pg_query("INSERT INTO user_info VALUES('$_POST[Username]','$_POST[email]','$_POST[password]'");
    // echo $x;
    $query = "insert into user_info values('$_POST[Username]','$_POST[email]', '$_POST[password]')";
    $query = pg_query($query);
    if($query)
      echo "inserted successfully!";
    else{
      echo "There was an error! ".pg_last_error();
    }

    // $result = pg_query("select * from abb");
    // echo "<br>", "Inserted Successfully";
    // echo "result: ", $result;
    pg_close($db);
?>