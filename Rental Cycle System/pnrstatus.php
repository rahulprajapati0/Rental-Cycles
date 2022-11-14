<?php 
session_start();
$conn = mysqli_connect("localhost","root","","rental_cycle_database");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cycle Availability</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background-color: #ffffffdb;
			width: 500px;
			height: 325px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
 
		}
		html { 
		  background: url(img/oval.jpeg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
	</style>
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="pnr">Cycle Availability in stands:<br/><br/>
	<?php
$conn = mysqli_connect("localhost","root","","rental_cycle_database");
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }



	$sql = "SELECT s_name, s_no_of_cycles FROM cycle_station";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Station</th><th>Available Cycles</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["s_name"]."</td><td>".$row["s_no_of_cycles"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}  
  mysqli_close($conn);

    ?>
	</div>
</center>
</body>
</html>