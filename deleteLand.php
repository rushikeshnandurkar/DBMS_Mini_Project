<?php

	session_start();
	$conn=mysqli_connect("localhost","root","password","estate");
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);

	}

	$myid = $_POST['selected'];

	$sql = "DELETE FROM buying WHERE id = '".$myid."'";

	$result = $conn->query($sql);
	if ($result == true) {
		header("location: mylands.php");
	}