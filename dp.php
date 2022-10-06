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
<body>

<?php
$id=$_POST["id"];

// pg_query($conn,$query);
// echo "Successfully added!";
    $result=pg_query($conn,"SELECT fare from tickets where passenger_id='$id'");
	pg_query($conn, "DELETE from passengers where passenger_id='$id'");
	$_SESSION["rr"]=$result;
    header('location:dpt.php');


  


?>

</body>
</html>