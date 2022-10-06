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
<h3 align="center"> List of All the Flights </h3>
<center>
	<table width="500" cellpadding="5" cellspacing="1">
	<tr>
        <th style="background-color:brown;">Flight_id</th>
		<th style="background-color:brown;">Arrival</th>
		<th style="background-color:brown;">Departure</th>
        <th style="background-color:brown;">route_no</th>
        <th style="background-color:brown;">Airplane_comp_code</th>
	</tr>


<?php
$d_airport=$_POST["d_airport"];
$a_airport=$_POST["a_airport"];
$d_date=$_POST["d_date"];
$d_time=$_POST["d_time"];

$result=pg_query($conn,"SELECT  distinct * FROM flights,arrivals,departures where flights.Arrival='$_POST[a_airport]' and flights.Departure='$_POST[d_airport]' and departures.dep_date='$_POST[d_date]' and departures.dep_time='$_POST[d_time]' and arrivals.apt_code=flights.Arrival and departures.apt_code=flights.Departure");
if(!$result)
{
	echo "an error occured";
}
else{
while($row = pg_fetch_row($result))
{
	?>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
    <td style="background-color:#FFEBC5;"><center><?php echo $row[4];?></center></td>
	</tr>
	<?php
}
}
?>
</table>
</center>
</body>
</html>