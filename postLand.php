<?php

	session_start();

	include("menuManager.php");
	$conn=mysqli_connect("localhost","root","password","estate");
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);

	}

	$usr = $_SESSION['login_user'];
	$totPrice = $_POST['area']*$_POST['psqft'];
	$sql="INSERT INTO buying(user,city,locality,land_type,location,area,psqft,e_price)
	VALUES('$usr','$_POST[city]','$_POST[locality]','$_POST[land_type]','$_POST[location]','$_POST[area]','$_POST[psqft]','$totPrice')";

	$result = $conn->query($sql);
	if ($result == true) {
		header("location: mylands.php");
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Land</title>
	<link rel="shortcut icon" href="Images/z.ico" />
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" type="text/css" href="menubar.css">
	<style type="text/css">
		.modal {
    		background-color: #fefefe;
   			margin: 5% auto 15% auto; 
    		border: 1px solid #888;
    		width: 35%; 
		}

		select {
 		   	width: 100%;
    		padding: 15px;
		    margin: 5px 0 22px 0;
    		display: inline-block;
    		border: none;
    		background: #f1f1f1;
		}

		input[type=number]{
			width: 85%;
    		padding: 15px;
		    margin: 5px 0 22px 0;
    		display: inline-block;
    		border: none;
    		background: #f1f1f1;
		}
		.modal-content {
			padding: 15px;
		}
		#location{
			width: 100%;
		}

		.lower-btn {
    		background-color: #4CAF50;
    		color: white;
    		padding: 14px 20px;
    		margin: 8px 0;
    		border: none;
    		cursor: pointer;
    		width: 40%;
    		opacity: 0.9;
    		text-decoration: none;
		}

		.lower-btn:hover {
    		opacity:1;
		}

		.cancel{
			background-color: red;
		}

	</style>
</head>
<body>

	<div class="header" id="headr">
		<a href="welcome.php">
  		<img src="Images/logo.jpg" alt="zaMIN logo">
		</a>
	</div>
	<?php echo $Menu; ?>

	<div class="modal">
		
		<form class="modal-content" method="POST" action="">
		<label for="city"><b>Select City</b></label><br>
		<select name="city">
			<option value="Pune">Pune</option>
			<option value="Mumbai">Mumbai</option>
			<option value="Nagpur">Nagpur</option>
			<option value="Nashik">Nashik</option>
		</select>

		<br><br>
		<label for="locality"><b>Locality</b></label><br>
		<select name="locality">
			<option value="Hinjewadi">Hinjewadi</option>
			<option value="Baner">Baner</option>
			<option value="Shivajinagar">Shivajinagar</option>
			<option value="University Road">University Road</option>
			<option value="PCMC">PCMC</option>
			<option value="Hadapsar">Hadapsar</option>
			<option value="Andheri">Andheri</option>
			<option value="Borivali">Borivali</option>
			<option value="Bandra">Bandra</option>
			<option value="Vile Parle">Vile Parle</option>
			<option value="Dhantoli">Dhantoli</option>
			<option value="Dharampeth">Dharampeth</option>			
		</select><br><br>

		<label for="land_type"><b>Land Type</b></label><br>
		<input type="radio" name="land_type" value="Residential" checked>Residential<br>
		<input type="radio" name="land_type" value="Farm">Farm<br>
		<input type="radio" name="land_type" value="Industrial">Industrial<br>
		<!-- <input type="radio" name="land_type" value="" checked><br> -->
		<br><br>

		<label for="location"><b>Location</b></label><br>
		<textarea id="location" name="location" placeholder="Address upto 15 letters" required maxlength="25" rows="5"></textarea><br><br>

		<label for="area"><b>Area of Land</b></label><br>
		<input type="number" name="area">in sq.ft.<br>

		<label for="psqft"><b>Rate</b></label><br>
		<input type="number" name="psqft">/sq.ft.<br><br>

		<input class="lower-btn" type="submit" value="Post">
		<a class="lower-btn cancel" href="welcome.php">Cancel</a>

		</form>

	</div>

</body>
</html>