<?php
$servername="localhost";
$username="postgres";
$password="surajkom98";
session_start();


$conn=pg_connect("host=localhost port=5432 dbname=airlines user=postgres password=surajkom98");

if(!$conn)
	echo "Connection failed to the database";
?>
<html>
<head>
	  <link rel = "stylesheet" type = "text/css" href="link.css"/>
</head>
<body>
	<meta name="viewport" content="width=device-width,user-scalable=yes"/>
	<div class="topnav">
  <a class="active" href="NEW.html">Main Page</a>
  <a href="login.html">Flight Maintenance</a>
  <a href="sp.html">PASSENGER MAINTENANCE</a>
  <a href="search_page.php">Search</a>
</div>
<center>


	<h3 align="center">DEPARTURES</h1>

	<table width="500" cellpadding="5" cellspacing="1"></center>
	<tr>
        <th style="background-color:orange;">dep_time</th>
		<th style="background-color:orange;">dep_date</th>
		<th style="background-color:orange;">Flight_id</th>
		<th style="background-color:orange;">Airport code</th>

		
		
        
	</tr>


<?php
$flight=$_POST["flight_id"];
$a_date=$_POST["a_date"];
$d_date=$_POST["d_date"];
$nd_time=$_POST["nd_time"];
$na_time=$_POST["na_time"];

pg_query($conn, "UPDATE departures SET dep_time='$nd_time' where Flight_id='$flight' and dep_date='$d_date'");
$result=pg_query($conn, "SELECT distinct * from departures where dep_time='$nd_time' and Flight_id='$flight'");
if(!$result)
{
	echo "an error occured";
}
else{
	echo"departure details";
while($row = pg_fetch_row($result))
{
	?>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
</tr>
	<?php
}
}?>

</table>

<br><br><br>
<h3 align="center">ARRIVALS</h1>

	<table width="500" cellpadding="5" cellspacing="1"></center>
	<tr>
        <th style="background-color:orange;">arr_time</th>
		<th style="background-color:orange;">arr_date</th>
		<th style="background-color:orange;">Flight_id</th>
		<th style="background-color:orange;">Airport code</th>

	
		
        
	</tr>
<?php
pg_query($conn, "UPDATE arrivals SET arr_time='$na_time' where Flight_id='$flight' and arr_date='$a_date'");
$result1=pg_query($conn, "SELECT distinct * from arrivals where arr_time='$na_time' and Flight_id='$flight'");
if(!$result1)
{
	echo "an error occured";
}
else{
	echo"ARRIVAL DETAILS";
while($row = pg_fetch_row($result1))
{
	?>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
</tr>
	<?php
}
}
?>
</table>
</body>
</html>