<?php
	session_start();
	$host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    $name = $_SESSION[user_name];
    // echo $_POST["stock_buy"];
    // echo "succuess!!";
    // $sql = "select * from stock_details where name ='$_SESSION[user_name]'";
    // $record = pg_query($sql);
    // $data = pg_fetch_all($record);
    $query0 = "SELECT close FROM ".$_POST["stock_buy"]. " WHERE date = '$_POST[date]';";
    $stock = strtoupper($_POST["stock_buy"]);
    $result0 = pg_query($query0);
    $h = pg_fetch_all($result0);
    $money =  floatval($h[0]["close"]);
    $uname = preg_replace('/\s/', '_', $_SESSION[user_name]);
    $exist_query = "select * from $uname where name ='$stock';";
    $exist = pg_query($exist_query);
    $exist_array = pg_fetch_all($exist);

    if ($exist_array[0]['name']){
    	echo "company present";
    	$a1 = floatval($_POST["amount"]);
    	$query1 = "SELECT * from $uname WHERE name = '$stock';";
    	$result0 = pg_query($query1);
    	$h = pg_fetch_all($result0);
    	$oa = floatval($h[0]['volume']);
    	$ua = $a1 + $oa;
    	$query0 = "UPDATE $uname SET volume = $ua WHERE name = '$stock';";
    	$result0 = pg_query($query0);
    	echo "done!!!";
    } else {
    	echo "company absent";
    }

    // $query0 = "insert into  $uname  values('$stock',  '$_POST[date]',".$_POST[amount].", $money); ";
    // echo $query0;

    // $hell = pg_query($query0);

    // if ($hell) {
    // 	echo "Inserted";
    // } else {
    // 	echo "RIP PROJECT";
    // }
    
    // $query0 = "insert into stock_details values('$name','$stock',".$_POST[amount].");";
    // echo $query0;
    // $hell = pg_query($query0);

    // if ($hell) {
    // 	echo "Inserted";
    // } else {
    // 	echo "RIP PROJECT";
    // }
    
    // echo $money;
    // echo "hi";
    // $query = "INSERT INTO $name"
    pg_close($db);
?>
