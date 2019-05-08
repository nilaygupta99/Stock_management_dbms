<?php
    session_start();
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    $stock = $_POST['stock_sell'];
    // echo $stock;
    // $name = $_SESSION[user_name];
    $uname = preg_replace('/\s/', '_', $_SESSION[user_name]);
    $sql = "select * from stock_details where name = '$uname' AND stocks_list = '$stock' ";
    $record = pg_query($sql);
    $data = pg_fetch_all($record);
    $current = floatval($data[0]['stocks_volume']);
    $sell = floatval($_POST['amount']);

    echo "Current: " . $current . "<br>Sell: " . $sell;

    if ($sell > $current) {
    	// echo "cannot sell<br>";
    	// Do nothing

    } elseif ($sell < $current) {
    	// echo "sold " . $sell . " Stocks<br>";
    	$new_vol = $current - $sell;
    	$query = "UPDATE $uname SET volume = $new_vol where name = '$stock' AND volume = $current;";
    	echo $query . "<br>";
    	$res = pg_query($query);
    	$query = "UPDATE stock_details SET stocks_volume = $new_vol where name = '$uname' AND stocks_list = '$stock' AND stocks_volume = '$current';";
    	$res = pg_query($query);
    	echo $query . "<br>";
    } elseif ($current == $sell) {
    	// echo "sold all stocks<br>";
    	$query = "DELETE FROM $uname WHERE name = '$stock' and volume = $sell;";
    	$res = pg_query($query);
    	echo $query . "<br>";
    	$query = "DELETE FROM stock_details WHERE name = '$uname' and stocks_list = '$stock' and stocks_volume = '$sell';";
    	$res1 = pg_query($query);
    	echo $query . "<br>";
    }


    // $query_profits = "select $name.name, $name.bought_for, current_values.close, $name.volume, current_values.close - $name.bought_for as Profit_Per_Stock from current_values inner join $name on $name.name = current_values.name;";
    // $fetch_profits = pg_query($query_profits);
    // $data1 = pg_fetch_all($fetch_profits);
    // echo "<br>";
    // echo $data1[0]['profit_per_stock'];
    header("location: portfolio.php");
    exit;

    pg_close($db);
    
    

?>