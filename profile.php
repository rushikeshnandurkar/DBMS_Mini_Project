<?php 
	session_start();
	include("menuManager.php");
	$usr = $_SESSION['login_user'];
	$conn=mysqli_connect("localhost","root","password","estate");
  	if($conn->connect_error)
  	{
  	  die("Connection failed:".$conn->connect_error);
  	}
  	$sql = "SELECT * FROM profile WHERE user ='$usr'";
  	$result = $conn->query($sql);
  	$arr = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="shortcut icon" href="Images/z.ico" />
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" type="text/css" href="menubar.css">

	<style type="text/css">
		
		.profile-body{
			width: 50%;
			height: 700px;
			margin: 0px 25%;
			background-color: white;
			font-size: 150%;
		}

		img.avatar {
    		width: 40%;
    		border: 1px solid red;
    		margin: 5px;
    		display: block;
    		border-radius: 50%;
    		margin-left: 200px;
		}

		.profile-body h2, .profile-body h4, .profile-body p{
			display: block;
			margin: 10px;
			text-align: center;
		}

		.profile-body a{
			padding: 15px;
			background-color: #4CAF50;
			text-decoration: none;
		}

		.btn{
			margin-left: 20%;
		}

		/*.profile-body h2{
			text-align: center;
		}*/

	</style>

</head>
<body>

	<div class="header">
	<a href="welcome.php">
  	<img src="Images/logo.jpg" alt="zaMIN logo">
	</a>
	</div>

	<?php echo $Menu; ?>

	<div class="profile-body">
		<img class = "avatar" src="Images/avatar2.png" alt="avatar"><br><br>
		<?php
			echo "<h2>".$arr['name']."</h2><br>";
			echo "<h4>Username : ".$arr['user']."</h4><br>";
			echo "<p>Mobile number : ".$arr['mobile']."</p><br>";
	  	?>
	  	<br><br>
	  	<div class="btn">
	  		<a href="mylands.php">My Lands</a>
	  		<a href="postLand.php">Post Land</a>
	  		<a href="editProfile.php">Edit Profile</a>
	  	</div>
	</div>

</body>
</html>