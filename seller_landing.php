<?php
	session_start();
	$loginstatus = $_SESSION['logg'];
	//header("location:profile.php");
	if ($loginstatus === "yep") {
		header("location:profile.php");
	}
	if ($loginstatus !== "yep") {
		header("location:LogIn.php");
	}

	

?>