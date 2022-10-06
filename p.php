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
$id=$_POST["randomnumber"];
$name=$_POST["Name"];
$email=$_POST["email"];
$date=$_POST["date"];
$phno=$_POST["contact"];
$flight=$_POST["f_id"];
$sex=$_POST["sex"];
$airport=$_POST["a_id"];
$_SESSION["pid"]=$id;
$_SESSION["fid"]=$flight;


$query="Insert into passengers values('$id','$name','$phno','$flight','$airport','$date','$email','$sex')";
// pg_query($conn,$query);
// echo "Successfully added!";

pg_send_query($conn,$query);
echo "added";
header('location:t.html');
  


?>

</body>
</html>