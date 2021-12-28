<?php
	session_start();
	if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
	{
		header("Location: index.php");
	}
	require("database.php"); 
	$error="";
	if(isset($_POST["login"]))
	{
		$username=test_data($_POST["username"]);
		$password=$_POST["password"];
		$mobile=$_POST["mobile"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		if(isset($_POST["public"]))
		{
			$public=1;
		}
		else
		{
			$public=0;
		}
		if(!empty($username) && !empty($password) && !empty($mobile) && !empty($email) && !empty($address))
		{
			$sql="INSERT into user(`username`,`password`,`mobile`,`email`,`address`,`public`)VALUES('$username','$password','$mobile','$email','$address','$public') ";
			if($conn->query($sql))
			{
				$last_id=$conn->insert_id;
				$id=$last_id;
				$_SESSION["user_id"]=$id;
				$_SESSION["username"]=$username;
				$_SESSION["mobile"]=$mobile;
				$_SESSION["email"]=$email;
				$_SESSION["address"]=$address;
				$_SESSION["public"]=$public;
				echo "<script>location.replace('index.php');</script>";
			}
			else
			{
				$error="<br><p class='bold text-danger'>Already Existing username!</p>";
			}
		}
		else
		{
			$error="<br><p class='bold text-danger'>Please fill empty fields</p>";
		}		
	}
	function test_data($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body style="min-height:600px">
<div class="menu">
	<ul>
		<li class="center"><h1 style='color:white;padding-left:10px' class="center">PROVIDE <span style="color:brown">END TO END SECURE</span> FILE COMMUNICATION</h1></li>
	</ul>
</div>
<div class="row" style='margin-top:2%'>
  <div class="col-3 col-s-3 menu">
     <ul>
	<?php
	if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
	{
		echo '<li>Logined as : <span style="color:brown">'.$_SESSION["username"].'</span></li>';
	}
	?>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php" >About</a></li>
	   <li><a href="share.php" >Share File</a></li>
      <li><a href="notify.php" >Notifications</a></li>
	  <?php 
			if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
			{	
				echo '<li><a href="logout.php">Logout</a></li>';
			}
			else
			{
				echo '<li class="active"><a href="register.php">Register</a></li>';
				echo '<li><a href="login.php">Login</a></li>';
			}
		?>
    </ul>
  </div>

  <div class="col-9 col-s-9">
     <div style="width:80%;margin:auto;border: 2px solid #0099cc; padding:20px">
		<h1>Register:</h1>
		<form name="addform" action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post" enctype="multipart/form-data" novalidate>
			<label for="username"><h5>Username</h5></label>
			<input type="text" name="username" id="username" placeholder="Enter your username" required>
			<label for="password" ><h5>Password</h5></label>
			<input type="password" name="password" id="password" placeholder="Enter your password" required>
			<label for="mobile"><h5>Mobile No</h5></label>
			<input type="number" name="mobile" id="mobile" placeholder="Mobile No" required>
			<label for="email" ><h5>E-mail</h5></label>
			<input type="email" name="email" id="email" placeholder="Enter your email" required>
			<label for="address" ><h5>Address</h5></label>
			<textarea name="address" placeholder="Enter Your Address" required></textarea>
			<input type="checkbox" name="public" id="public"><label for="public" >Make profile as public (If you want getnotification of document)</label>
			<input type="submit" name="login" value="Submit">
			
		</form>
	</div>
  </div>


</div>



</body>
</html>
