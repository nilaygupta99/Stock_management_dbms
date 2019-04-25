	
<?php
	session_start();
	$host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = company";
    $credentials = "user = postgres password = postgres";
    $db = pg_connect("$host $port $dbname $credentials");
    $sql = "select * from stock_details where name ='$_SESSION[user_name]'";
    $record = pg_query($sql);
    $data = pg_fetch_all($record);
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
		<center><h1> <?php echo "$_SESSION[user_name]" ?> </h1></center>
		<br><br>
		<table id="stock_info" class="table" width="100%" cellspacing="1">
		<thead>
			<tr>
			<!-- <th>Name</th> -->
			<th bgcolor="cyan">Stocks List</th>
			<th>Stocks Volume</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $key => $emp) :?>
			<tr>
			<!-- <td align=center><?php echo $emp['name'] ?></td> -->
			<td align=center><?php echo $emp['stocks_list'] ?></td>
			<td align=center><?php echo $emp['stocks_volume'] ?></td>
			</tr>
		<?php endforeach;?>
			
		</tbody>
		</table>
	</div>
</html>

