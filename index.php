<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
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
      <li class="active"><a href="index.php">Home</a></li>
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
				echo '<li><a href="register.php">Register</a></li>';
				echo '<li><a href="login.php">Login</a></li>';
			}
		?>
    </ul>
  </div>

  <div class="col-9 col-s-9">
    <div style="width:80%;margin:auto;border: 2px solid #0099cc; padding:20px">
		<h1>Proposed System:</h1>
		<p>	We propose a new design for large-scale multimedia content protection systems. Our design leverages cloud infrastructures to provide cost efficiency, rapid deployment, scalability, and elasticity to accommodate varying workloads. The proposed system can be used to protect different multimedia content types, including 2-D videos, 3-D videos, images, audio clips, songs, and music clips. The system can be deployed on private and/or public clouds. Our system has two novel components: (i) method to create signatures of 3-D videos, and (ii) distributed matching engine for multimedia objects. The signature method creates robust and representative signatures of 3-D videos that capture the depth signals in these videos and it is computationally efficient to compute and compare as well as it requires small storage. The distributed matching engine achieves high scalability and it is designed to support different multimedia objects. </p>
	</div>
  </div>


</div>



</body>
</html>
