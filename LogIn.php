<?php
  session_start();

  $conn=mysqli_connect("localhost","root","password","estate");
  if($conn->connect_error)
  {
    die("Connection failed:".$conn->connect_error);
  }
  if(isset($_POST['user']))
  {
    $name1="$_POST[user]";
    $_SESSION['login_user']=$name1;
    $pass1="$_POST[password]";
    $sql="SELECT * FROM profile WHERE user='".$name1."' AND password='".$pass1."' limit 1";
    $result = $conn->query($sql);
      
    
    if(mysqli_num_rows($result) == 1)
    {
      $_SESSION['logg'] = "yep";
     header('location:welcome.php');
     exit();
     /*$conn->close();*/

    }
    else
    {
     $error = "Your Login Name or Password is invalid";
     /*exit();*/
    }

  }
  /*$conn->close();*/
?>



<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="Images/z.ico" />
	<title>Log In !</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
body {font-family: Arial, Helvetica, sans-serif;
        background-image: url(Images/wallpaper2.jpg);    
    }

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
/*.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}*/

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.password {
    float: right;
    padding-top: 16px;
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
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 25%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

#signuplink {
    display: inline-block;
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.password {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>



<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST" action="">
    <div class="imgcontainer">
      <img src="Images/avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="passaword"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button><br><br>
      <div style = "color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      
      <span class="password"><a href="#">Forgot password?</a></span><br><br><br>
      <div id="signuplink">
        <a href="SignUp.php">Not a Member? Sign Up</a>
      </div>
    </div>

   <!--  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password"><a href="#">Forgot password?</a></span>
    </div> -->
  </form>
</div>

<!-- <script>
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