<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About</title>
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
      <li class="active"><a href="about.php" >About</a></li>
      <li><a href="share.php" >Share File</a></li>
      <li><a href="notify.php" >Notifications</a></li>
	  <?php 
			if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
			{	
				echo '<li><a href="logout.php">Logout</a></li>';
			}
			else
			{
				echo '<li><a href="register.php">Register</a></li>';
				echo '<li><a href="login.php">Login</a></li>';
			}
		?>
    </ul>
  </div>

  <div class="col-9 col-s-9">
    <div style="width:80%;margin:auto;border: 2px solid #0099cc; padding:20px">
		<h1>Proposed System:</h1>
		<img src="public-key.jpeg" width="100%">
		<p>	End-to-end encryption is a system of communication where the only people who can read the messages are the people communicating. No eavesdropper can access the cryptographic keys needed to decrypt the conversation—not even a company that runs the messaging service. </p>
	</div>
  </div>


</div>



</body>
</html>
