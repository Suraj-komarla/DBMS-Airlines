<?php
error_reporting( E_NOTICE ) ;
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
<h3 align="center"> YOUR DETAILS </h3>
<center>
  <table width="500" cellpadding="5" cellspacing="1">
  <tr>
        <th style="background-color:brown;">Passenger_id</th>
    <th style="background-color:brown;">name</th>
    <th style="background-color:brown;">Contact</th>
        <th style="background-color:brown;">Flight_id</th>
        <th style="background-color:brown;">Airport_code</th>
        <th style="background-color:brown;">date_of_birth</th>
    <th style="background-color:brown;">email</th>
    <th style="background-color:brown;">fare</th>
        <th style="background-color:brown;">type</th>
        <th style="background-color:brown;">route_no</th>
                

  </tr>


<?php
$id=$_SESSION["pid"];
$type=$_POST["type"];
$route=$_POST["route"];
if($type=="Business class")
{
  $fare=$route*1000;
}
else if($type=="Economy class")
{
  $fare=$route*500;
}
$query="Insert into Tickets values('$fare','$type','$id','$route')";
pg_send_query($conn,$query);
$result=pg_query($conn,"SELECT distinct * FROM passengers as p,tickets as t where p.Passenger_id=t.passenger_id and p.Passenger_id='$id'");
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
     <td style="background-color:#FFEBC5;"><center><?php echo $row[5];?></center></td>
  <td style="background-color:#FFEBC5;"><center><?php echo $row[6];?></center></td>
  <td style="background-color:#FFEBC5;"><center><?php echo $row[7];?></center></td>
  <td style="background-color:#FFEBC5;"><center><?php echo $row[8];?></center></td>
    <td style="background-color:#FFEBC5;"><center><?php echo $row[9];?></center></td>
        

  </tr>
  <?php
}
}
?>
</table>
</center>
</body>
</html>