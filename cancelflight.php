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
	<div class="topnav">
  <a class="active" href="NEW.html">Main Page</a>
  <a href="login.html">Flight Maintenance</a>
  <a href="sp.html">PASSENGER MAINTENANCE</a>
  <a href="search_page.php">Search</a>
</div>
<?php

$flight=$_POST["flight_id"];
$d_date=$_POST["d_date"];
$d_time=$_POST["d_time"];
$a_date=$_POST["a_date"];
$a_time=$_POST["a_time"];
$status=$_POST["status"];

if($status=="de-comissioned")
{
	pg_query($conn, "DELETE from flights where flight_id='$flight'");
	echo "successfully decomissioned";
}
else if($status=="cancelled")
{
	pg_query($conn,"DELETE from arrivals where flight_id='$flight' and arr_date='$a_date' and arr_time='$a_time'");
	pg_query($conn, "DELETE from departures where flight_id='$flight' and dep_date='$d_date' and dep_time='$d_time'");
	echo "successfully cancelled";
}
?>

</body>
</html>