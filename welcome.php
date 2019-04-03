<?php 
	session_start();
	include("menuManager.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>zaMIN - Investments without risks</title>
	<link rel="shortcut icon" href="Images/z.ico" />
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" type="text/css" href="menubar.css">
</head>
<body>

<div class="header">
	<a href="welcome.php">
  	<img src="Images/logo.jpg" alt="zaMIN logo">
	</a>
</div>


<?php echo $Menu; ?>
<div class="div1 div_">	
	<a class="choice_button" href="buy.php">I want to Buy</a>
	<a class="choice_button" href="seller_landing.php">I want To Sell</a>
</div>


<div class="coyright">
	space for Copyright Notice
</div>

</body>
</html>