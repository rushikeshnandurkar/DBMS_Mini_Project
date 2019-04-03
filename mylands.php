<?php 
	session_start();
	include("menuManager.php");
	$usr = $_SESSION['login_user'];
	$conn=mysqli_connect("localhost","root","password","estate");
  	if($conn->connect_error)
  	{
  	  die("Connection failed:".$conn->connect_error);
  	}
  	$sql = "SELECT * FROM buying WHERE user ='$usr'";
  	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<title>My Land</title>
	<link rel="shortcut icon" href="Images/z.ico" />
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" type="text/css" href="menubar.css">

	<style type="text/css">
		
		.profile-body{
			position: fixed;
			overflow: auto;
			height: 70%;
			width: 70%;
			margin: 0px 15%;
			background-color: white;
			/*font-size: 150%;*/
		}

		.filter-result{
			background-color: white;
			/*margin-left: 280px;
			margin-right: 10px;
			margin-bottom: 10px;*/
			margin: 10px;
			height: 200px;
			border: 1px solid black;
			width: 95%;
			position: relative;
		}

		.filter-result:hover {
			box-shadow: 5px 5px 5px 5px #888888;
		}

		.filter-result h2,.filter-result h4{
			font-family: sans-serif;
			padding: 15px;
			margin: 0;
			display: inline-block;
			margin-left: 200px;
		}
		.filter-result .psqft{
			width: 100px;
			height: 30px;
			font-family: sans-serif;
			background-color: #595757;
			color: white;
			float: right;
			top: 2px;
			padding: 15px;
			margin: 5px;

		}


		.daba {
			height: 150px;
			width: 150px;
			position: absolute;
			border: 1px solid black;
			margin: 5px;
		}

		.daba img{
			height: 150px;
			width: 150px;
			border: 1px solid black;
			margin: 0px;
		}

		.upper-btn{
			padding: 10px;
			background-color: orange;
			margin: 60px;
			text-decoration: none;
			color: white;

		}

		.frm input[type='checkbox']{
			display: none;
		}
		.f01 {
			float: right;
			
		}

		.f02 {
			float: right;
		}

		.f01 input[type='submit']{
			background-color: #4CAF50;
    		color: white;
    		padding: 6px;
    		margin: 15px;
    		border: none;
    		cursor: pointer;
    		width: 50px;

		}
		.f02 input[type='submit']{
			background-color: red;
    		color: white;
    		padding: 6px;
    		margin: 15px;
    		border: none;
    		cursor: pointer;
    		width: 50px;

		}


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
		<!-- <a class="upper-btn" href="">Edit Land Specs</a>
		<a class="upper-btn" href="">Delete Land</a> -->
		<?php
				for ($i=0; $i < count($rows); $i++) { 
					/*$usr = $rows[$i]['user'];*/
					echo "<div class='filter-result'>
					<p class = 'psqft'><b>Rs.".$rows[$i]["psqft"]."/sq.ft</b></p>
					<div class = 'daba'>
					<img src = 'Images/landforsale.jpg'>
					</div>
					<h2>".$rows[$i]["area"]."sq.ft in ".$rows[$i]["locality"]."</h2><br>
					<h4>address :".$rows[$i]["location"]." </h4><br>
					<h4>".$rows[$i]["land_type"]." </h4><br>
					<form class='frm f02' method='POST' action='deleteLand.php'>
						<input type='checkbox' name='selected' value='".$rows[$i][id]."' checked>
						<input type='submit' value='Delete'>
					</form>
					<form class='frm f01' method='POST' action='editLand.php'>
						<input type='checkbox' name='selected' value='".$rows[$i][id]."' checked>
						<input type='submit' value='edit'>
					</form>
					
					</div>";
				}
			?>
	</div>

</body>
</html>