<?php
  if(isset($_POST['name'])){
	if(preg_match('/([7-9]{1}[0-9]{9})/',$_POST[mobile]))	
	{
		$tel="$_POST[mobile]";
		$p1="$_POST[password]";
		$p2="$_POST[cpassword]";	
		if($p1==$p2){
		$pass = "$_POST[password]";
		$conn=mysqli_connect("localhost","root","password","estate");
		if($conn->connect_error)
		{
			die("Connection failed:".$conn->connect_error);
		}
		$sql="INSERT INTO profile(name,address,user,email_id,mobile,aadhar,password)
		VALUES('$_POST[name]','$_POST[address]','$_POST[user]','$_POST[email_id]','$tel','$_POST[aadhar]','$pass')";
		if($conn->query($sql)== TRUE)
		{
	 		header('location:LogIn.php');

		}
		else
		{
			$error = "Error:".$sql.$conn->error;
		}
		$conn->close();	
	}
	else{
		$error =  "Passwords don't match";
	}
	}

 	else
 	{
 		$error =  "Invalid mobile number";
 	}
 }

?>


<!DOCTYPE html>
<html>
<title>Sign Up !</title>
<link rel="shortcut icon" href="Images/z.ico" />
<style>
body {font-family: Arial, Helvetica, sans-serif;
      background-image: url("Images/wallpaper2.jpg");}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}


/* Float cancel and signup buttons and add an equal width */
.signupbtn {
  float: left;
  width: 100%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
   /* background-color: #474e5d;*/
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 35%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>



<div id="id01" class="modal">
  <form class="modal-content animate" method="POST" action="">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="name" required maxlength="20">

      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter your address" name="address" required maxlength="100">

      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required maxlength="15">

      <label for="email_id"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email_id" required maxlength="30">

     <!--  <label for="name"><b>Mobile no.</b></label>
      <input type="text" id="mobile" name = "mobile" required maxlength="10"> -->

      <label for="mobile"><b>Mobile no.</b></label>
      <input type="text" placeholder="Enter Mobile no." name="mobile" required maxlength="10">

      <label for="aadhar"><b>Aadhar no.</b></label>
      <input type="text" placeholder="Enter aadhar no." name="aadhar" required maxlength="12">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required maxlength="20">

      <label for="cpassword"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="cpassword" required maxlength="20">
      
      <div style = "color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      <a href="LogIn.php">Already a user, Log In!</a>

      <div class="clearfix">
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<!-- 
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> -->


</body>
</html>