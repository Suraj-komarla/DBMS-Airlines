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
</style>
	<body>
		<div class="topnav">
  <a class="active" href="NEW.html">Main Page</a>
  <a href="login.html">Flight Maintenance</a>
  <a href="sp.html">PASSENGER MAINTENANCE</a>
  <a href="search_page.php">Search</a>
</div>
<?php
 
 $password=$_POST["password"];
 if($password=="surajkom98")
 {
 	header('location:maintenance.html');
 }
 else
 {
 	echo "ACCESS DENIED";
 }
 ?>
</body>
</html>
