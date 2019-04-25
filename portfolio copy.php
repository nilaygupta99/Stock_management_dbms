	
<?php
	session_start();
	$host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    $name = $_SESSION[user_name];
    $sql = "select * from stock_details where name ='$_SESSION[user_name]'";
    $record = pg_query($sql);
    $data = pg_fetch_all($record);

    // $query_profits = "select $name.name, $name.bought_for, current_values.close, $name.volume, current_values.close - $name.bought_for as Profit_Per_Stock from current_values inner join $name on $name.name = current_values.name;";
    // $fetch_profits = pg_query($query_profits);
    // $data1 = pg_fetch_all($fetch_profits);
    // echo "<br>";
    // echo $data1[0]['profit_per_stock'];

    pg_close($db);
    
    

?>

<html>
  <head>
    <title> Portfolio: <?php echo "$_SESSION[user_name]" ?></title>
    <!-- <link href="css/login_page.css" rel="stylesheet" type="text/css" media="all" /> -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="login_page.css" rel="stylesheet">
  </head>
  <div class='content'>
        <br>
		<center><h1> <?php echo "$_SESSION[user_name]" ?> </h1></center>
		<br><br>
		<table id="stock_info" class="table" width="100%" cellspacing="1">
		<thead>
			<tr>
			<!-- <th>Name</th> -->
			<th>Stocks List</th>
			<th>Bought on</th>
			<th>Stocks Volume</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $key => $emp) :?>
			<tr>
			<!-- <td align=center><?php echo $emp['name'] ?></td> -->
			<td align=center><?php echo $emp['stocks_list'] ?></td>
			<td align=center><?php 
				session_start();
				$host = "host = localhost";
			    $port = "port = 5432";
			    $dbname = "dbname = company";
			    $credentials = "user = postgres password = postgres";
			    $db = pg_connect("$host $port $dbname $credentials");
				$name = $_SESSION[user_name];
				$stock_name = $emp['stocks_list'];
                $query_profits = "select * from $name where name = '$stock_name';";
				$fetch_profits = pg_query($query_profits);
    			$data1 = pg_fetch_all($fetch_profits);
    			echo $data1[0]['bought_on'];
    			pg_close($db);
			 ?></td>
			<td align=center><?php echo $emp['stocks_volume'] ?></td>
			</tr>
		<?php endforeach;?>
			
		</tbody>
		</table>
	</div>
    <br><br><br>
    <div class='content'>
        <table id='profit_table' class='table' width="100%" cellspacing="1">

            <thead>

                <tr>
                <th>Stocks List</th>
                <th>Bought for</th>
                <th>Current Value</th>
                <th>Total Profit</th>
                <th>Profit Percentage</th>
                </tr>

            </thead>

        <tbody>
            <?php foreach($data as $key => $emp) :?>
            <?php
                session_start();
                $host = "host = localhost";
                $port = "port = 5432";
                $dbname = "dbname = company";
                $credentials = "user = postgres password = postgres";
                $db = pg_connect("$host $port $dbname $credentials");
                $name = $_SESSION[user_name];
                $stock_name = $emp['stocks_list'];
                $query_profits = "select $name.name, $name.bought_for, current_values.close, current_values.close - $name.bought_for as Profit_Per_Stock from current_values inner join $name on $name.name = current_values.name where $name.name = '$stock_name';";
                $fetch_profits = pg_query($query_profits);
                $data1 = pg_fetch_all($fetch_profits);
//                echo $data1[0]['profit_per_stock'];
                pg_close($db);
                ?>
            <tr>
            <!-- <td align=center><?php echo $emp['name'] ?></td> -->
            <td align=center><?php echo $emp['stocks_list'] ?></td>
            <td align=center><?php echo $data1[0]['bought_for'] ?></td>
            <td align=center><?php echo $data1[0]['close'] ?></td>
            <td align=center><?php echo $data1[0]['profit_per_stock'] ?></td>
            <td align=center><?php
                $profit_percentage = ($data1[0]['close'] - $data1[0]['bought_for'])/($data1[0]['bought_for'])*100;
                // echo $profit_percentage;
                echo number_format($profit_percentage, 2, '.', ''), '%';
            ?></td>
            </tr>
            <?php endforeach;?>

        </tbody>

        </table>
    </div>
</html>

