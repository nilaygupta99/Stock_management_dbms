	



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
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
	<link href="front_page.css" rel="stylesheet">
  </head>
  <div class='content'>
		<center><h1> <?php echo "$_SESSION[user_name]" ?> </h1></center>
		<br><br>
		<table id="stock_info" class="table" width="100%" cellspacing="1">
			<!-- <thead> -->
				<tr>
				<!-- <th>Name</th> -->
				<th>Stocks List</th>
				<th>Profit / stock</th>
				<th>Stocks Volume</th>
				</tr>
			<!-- </thead> -->
			<!-- <tbody> -->
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
					$query_profits = "select $name.name, $name.bought_for, current_values.close, $name.volume, current_values.close - $name.bought_for as Profit_Per_Stock from current_values inner join $name on $name.name = current_values.name where $name.name = '$stock_name';";
					$fetch_profits = pg_query($query_profits);
	    			$data1 = pg_fetch_all($fetch_profits);
	    			echo $data1[0]['profit_per_stock'];
	    			pg_close($db);
				 ?></td>
				<td align=center><?php echo $emp['stocks_volume'] ?></td>
				</tr>
				<?php endforeach;?>
				
			<!-- </tbody> -->
		</table>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<br><br><br>
	<div class='content'>
		<table id='profit_table' class='table' width="100%" cellspacing="1">
			
			<thead>
				
				<tr>
					<th>Stocks List</th>
					<th>Current Value</th>
					<th>Total Profit</th>
				</tr>

			</thead>

			<tbody>


			</tbody>

		</table>
	</div>
</html>

