	
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

<center><h1> <?php echo "$_SESSION[user_name]" ?> </h1></center>

<table id="employee_grid" class="table" width="100%" cellspacing="0">
	<thead>
		<tr>
		<!-- <th>Name</th> -->
		<th>Stocks List</th>
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


