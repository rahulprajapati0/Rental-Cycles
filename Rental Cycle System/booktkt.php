<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo '<script type="text/javascript">'; 
		echo 'alert("Please login before proceeding further!");'; 
		echo 'window.location.href = "http://localhost/Rental%20Cycle%20System/login.php?";';
		echo '</script>';
	}
$conn = mysqli_connect("localhost","root","","rental_cycle_database");
if(!$conn){
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$cycle=$_POST['cycle'];
$sql = "SELECT s_name FROM cycle_station WHERE s_name = '$cycle'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$bal=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avail_bal FROM passengers WHERE email='$email'"));
$book_status=mysqli_fetch_assoc(mysqli_query($conn,"SELECT book_status FROM passengers WHERE email='$email'"));
$avail_cycle = mysqli_fetch_assoc(mysqli_query($conn,"SELECT s_no_of_cycles FROM cycle_station WHERE s_name = '$row[s_name]'"));


if($book_status['book_status'] == 1)
{
	$message="Cycle already booked!";
}
else if($bal['avail_bal'] < 2)
{
	$message="Insufficient balance. !! Please Recharge !!";
}
else if($avail_cycle['s_no_of_cycles']==0)
{
	$message="Cycle not available at this stand. Please find at nearby station.";
}
else{
	$sql="UPDATE passengers SET avail_bal=avail_bal-2 WHERE email='$email';";
	mysqli_query($conn, $sql);
	$sql="UPDATE passengers SET book_status=1 WHERE email='$email';";
	mysqli_query($conn, $sql);
	$message = "Ticket booked successfully";
	$sql="UPDATE passengers SET source='$row[s_name]' WHERE email='$email';";
	mysqli_query($conn, $sql);
	$sql="UPDATE cycle_station SET s_no_of_cycles=s_no_of_cycles-1 WHERE s_name = '$row[s_name]';";
	mysqli_query($conn, $sql);
	$user_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM passengers WHERE email = '$email'"));
	$sql="INSERT INTO tickets(`user_id`,`source`,`first_name`,`last_name`,`age`,`contact`,`gender`,`adm_no`,`email`) VALUES ($user_id[p_id],'$row[s_name]','$user_id[p_fname]', '$user_id[p_lname]', '$user_id[p_age]', '$user_id[p_contact]', '$user_id[p_gender]', '$user_id[adm_no]', '$user_id[email]')";
	mysqli_query($conn, $sql);
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a cycle</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: #ffffffdb;
			border-radius: 25px;
		}
		html { 
		  background: url(img/main_gate.png) no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: black;
			font-size: 28px;
			font-family:"montserrat", cursive, sans-serif;
		}
		#cycle	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			border-radius: 5px;
			background-color: lightgrey;
			padding: 7px 7px 7px 7px;
			box-shadow: inset -1px -1px rgba(0,0,0,0.5);
			font-family:"Comic Sans MS", cursive, sans-serif;
			font-size: 17px;
			margin:auto;
			margin-top: 20px;
			display:block;
			color: black;
			margin-bottom : 30px;
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var cycle=document.getElementById("cycle");
			if(cycle.selectedIndex==0)
			{
				alert("Please select your cycle");
				cycle.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your source station</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
		<select id="cycle" name="cycle" required>
			<option selected disabled>-------------------Pick a cycle from----------------------</option>
			<option value="Jasper" >Jasper Hostel</option>
			<option value="Amber" >Amber Hostel</option>
			<option value="Diamond" >Diamond Hostel</option>
			<option value="Academic Complex" >Academic Complex</option>
			<option value="Rock Garden" >Rock Garden</option>
			<option value="Health Centre" >Health Centre</option>
			<option value="Library" >Central Library</option>
			<option value="NLHC" >NLHC</option>
			<option value="Rosaline" >Rosaline Hostel</option>
		</select>
		<br/><br/>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	<?php
	$conn = mysqli_connect("localhost","root","","rental_cycle_database");
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$email=$_SESSION['user_info'];
		$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avail_bal FROM passengers WHERE email = '$email'"));
		//$sql = "SELECT avail_bal FROM passengers WHERE email = '$email'";
		// $result = $conn->query($sql);
		//echo '<span style="color:#AFA;text-align:center;">Available Balance : .$sql['avail_bal']</span>';
		$message="Available Balance : ".$sql['avail_bal'];
		//echo $message;
		echo "<font color= black font size = 5px> $message </font>";
		// echo '<span style="color:#AFA;text-align:center;">$message</span>';
	mysqli_close($conn);
    ?>
	
	
	
	<!-- <h2 align="center" id="availbaluser">lauda</h2><br/> -->
	</div>
	</body>
	</html>