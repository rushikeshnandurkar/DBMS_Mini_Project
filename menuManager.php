<?php
	$current_user = $_SESSION['login_user'];
	$loginstatus = $_SESSION['logg'];
	if ($loginstatus !== "yep") {
		$Menu = '<div id="menubar">
	<ul>
		<li><a href="welcome.php">Home</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="#">Support</a></li>
		<li><a href="#">FAQs</a></li>
		<div class="nav_right">
			<li><a href="LogIn.php">Log In</a></li>
			<li><a href="SignUp.php">Sign Up</a></li>
		</div>
	</ul>
	<div>';
	}

	if ($loginstatus === "yep") {
		$Menu = '<div id="menubar">
	<ul>
		<li><a href="welcome.php">Home</a></li>
		<li><a href="buy.php">Buy</a></li>
		<li><a href="seller_landing.php">Sell</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="#">Support</a></li>
		<li><a href="#">FAQs</a></li>
		<div class="nav_right">
			<li><a href="LogOut.php">Log Out</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="#">Welcome '.$current_user .'</a></li>
		</div>
	</ul>
	<div>';
	}

?>