<?php

	session_start();

	include("menuManager.php");
	$conn=mysqli_connect("localhost","root","password","estate");
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);

	}

	$myid = $_SESSION['id'];

	$totPrice = $_POST['area']*$_POST['psqft'];

	$city = $_POST['city'];
	$locality = $_POST['locality'];
	$land_type = $_POST['land_type'];
	$location = $_POST['location'];
	$area = $_POST['area'];
	$psqft = $_POST['psqft'];

	$sql="UPDATE buying SET city='$city',locality='$locality',land_type='$land_type',location='$location',area=$area,psqft=$psqft,e_price=$totPrice WHERE id='".$myid."'";
	
	$result = $conn->query($sql);
	if ($result == true) {
		header("location: mylands.php");
	}
	

?>