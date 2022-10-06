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
<h3 align="center"> ROUTE DETAILS</h3>
<center>
	<table width="500" cellpadding="5" cellspacing="1">
	<tr>
        <th style="background-color:brown;">Route_No</th>
        <th style="background-color:brown;">Route_Name</th>

	</tr>


<?php
$d_airport=$_POST["d_airport"];
$a_airport=$_POST["a_airport"];


$result=pg_query($conn,"SELECT  distinct * FROM Routes where Routes.route_no in (select route from flights where flights.Arrival='$_POST[a_airport]' and flights.Departure='$_POST[d_airport]')");
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
	
	</tr>
	<?php
}
}
?>
</table>
</center>
</body>
</html>