<?php 

	session_start();

	include("menuManager.php");
	$conn=mysqli_connect("localhost","root","password","estate");
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);

	}

	$city=$_POST['city'];
	$locality=$_POST['locality'];
	$land_type = $_POST['land_type'];
	$minRate = $_POST['psqft1'];
	$maxRate = $_POST['psqft2'];

	$sql="SELECT buying.*, profile.mobile FROM buying 
	LEFT JOIN profile ON buying.user = profile.user
	WHERE city='$city' AND locality='$locality' AND land_type='$land_type' AND psqft>'$minRate' AND psqft<'$maxRate' " ;
	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	/*$sql = "SELECT user , mobile FROM profile";
	$result1 = $conn->query($sql);
	$phn = $result1->fetch_all(MYSQLI_ASSOC);*/
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buy Land</title>
	<link rel="shortcut icon" href="Images/z.ico" />
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" type="text/css" href="menubar.css">

	<style type="text/css">
		
		.side-form{
			float: left;
			position: fixed;
			height: 100%;
			font-family: sans-serif;
			padding: 30px;
			background-color: #a5a5a5;
			font-size: 18px;
			width: 200px;
		}

		.side-form select{
			width: 100%;
    		padding: 12px 20px;
    		margin: 8px 0;
    		display: inline-block;
    		border: 1px solid #ccc;
    		border-radius: 14px;
    		box-sizing: border-box;
		}

		.side-form input[type=number]{
			width: 60px;
			padding: 6px;
    		margin: 8px 0;
    		display: inline-block;
    		border: 1px solid #ccc;
    		border-radius: 14px;
    		box-sizing: border-box;
    		background-color: #d3d3d3;
		}

		.side-form input[type=submit]{
			width: 100%;
   			background-color: #595757;
  		    color: white;
    		padding: 14px 20px;
    		margin: 8px 0;
    		border: none;
    		border-radius: 4px;
   	 		cursor: pointer;
		}

		.result-body {
			position: fixed;
			overflow: auto;
			height: 70%;
			width: 80%;
			margin: 0px 15%;
			margin-left: 250px;
			/*background-color: white;*/
			/*font-size: 150%;*/
		}

		.filter-result{
			background-color: white;
			margin-left: 50px;
			margin-right: 10px;
			margin-bottom: 10px;
			height: 200px;
			border: 1px solid black;
			width: 90%;
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


		.filter-result .contact{
			width: 200px;
			height: 30px;
			font-family: sans-serif;
			background-color: #09c400;
			color: white;
			padding: 15px;
			margin: 5px;
			float: right;
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

		.header {
			position: sticky;
			top: 0;
		}
		.menubar{
			position: sticky;
			top: 150px;
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


	<div class="side-form">
	<form method="POST" action="">

		<label for="city"><b>Select City</b></label><br>
		<select name="city">
			<option value="select">-- Select One --</option>
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
		<label for="psqft"><b>Price Range</b></label><br>
		Rs. <input type="number" name="psqft1" value="0"> to
		<input type="number" name="psqft2" value="10000"><br>per sq.ft
		<br><br>
		<input type="submit" value="Filter">
		</div>
	</form>
			<div class="result-body">
			
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
					<p class = 'contact'><b>Contact the seller<br>".$rows[$i]['mobile']."</b></p>
					</div>";
				}
			?>
		</div>
		
<!-- <script type="text/javascript">
	document.getElementById("headr").style.position="fixed";
</script> -->
</body>
</html>