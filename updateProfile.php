<?php
	session_start();
	$current_user = $_SESSION['login_user'];
	if(preg_match('/([7-9]{1}[0-9]{9})/',$_POST[mobile]))	
	{
		$tel="$_POST[mobile]";	
		$conn=mysqli_connect("localhost","root","password","estate");
		if($conn->connect_error)
		{
			die("Connection failed:".$conn->connect_error);
		}

		$name = $_POST['name'];
		$address = $_POST['address'];
		$user = $_POST['user'];
		$email = $_POST['email_id'];
		$aadhar = $_POST['aadhar'];

		$sql = "UPDATE profile SET name='$name',address='$address',user='$user',email_id='$email',mobile='$tel',aadhar='$aadhar' WHERE user='$current_user'";

		$_SESSION['login_user'] = $user;

		if($conn->query($sql)== TRUE)
		{
	 		header('location:profile.php');

		}
		else
		{
			$_SESSION['error'] = "Error:".$sql.$conn->error;
			header('location:editProfile.php');
		}
		$conn->close();	
	}

 	else
 	{
 		$_SESSION['error'] =  "Invalid mobile number";
 		header('location:editProfile.php');
 	}

?>