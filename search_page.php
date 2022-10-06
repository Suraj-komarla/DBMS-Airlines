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
<style>
.hea{

}
</style>
	<body>
		<div class="topnav">
  <a class="active" href="NEW.html">Main Page</a>
  <a href="login.html">Flight Maintenance</a>
  <a href="sp.html">PASSENGER MAINTENANCE</a>
  <a href="search_page.php">Search</a>
</div>
		<center class="hea">
			<h1>
				<a href="search_routes.html">SEARCH FOR ROUTES</a>
			</h1>
		</center>
		<br/>
		<center class="hea">
			<h1>
				<a href="s.html">SEARCH FOR FLIGHTS</a>
			</h1>
		</center>
		<center class="hea">
			<h1>
				<a href="dispflight.html">DISPLAY</a>
			</h1>
		</center>


<meta name="viewport" content="width=device-width,user-scalable=yes"/>
<h3 align="center"> List of All the Airport codes </h3>
<center>
	<table width="500" cellpadding="5" cellspacing="1">
	<tr>
        <th style="background-color:brown;">Airport name</th>
        <th style="background-color:brown;">Airport code</th>

	</tr>


<?php



$result=pg_query($conn,"SELECT * FROM Airports");
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

