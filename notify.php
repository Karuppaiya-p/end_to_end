<?php
	session_start();
	if(!isset($_SESSION["username"]) && !isset($_SESSION["username"]))
	{
		$_SESSION["resturi"]=$_SERVER["REQUEST_URI"];
		die(header('Location: login.php'));
	}
	else
	{
		$_SESSION["resturi"]="";
	}
	require("database.php");
	$out="";
	$share_with="";
	$public=0;
	if(isset($_POST["download"]))
	{
		$key_value=$_POST["key".$_POST["download"]];
		if(!empty($key_value))
		{
			$sql=$conn->query("Select * from upload where (id='".$_POST["download"]."' and binary key_value='$key_value') and (public=1 OR FIND_IN_SET('".$_SESSION["username"]."',`share_with`))");
			if($sql->num_rows==1){
				$row=$sql->fetch_assoc();
				$File=$row["file"];
				header("Content-Disposition: attachment; filename=\"" . basename($File) . "\"");
				header("Content-Type: application/octet-stream");
				header("Content-Length: " . filesize($File));
				header("Connection: close");
			}
			else
			{
				echo "<script>alert('Invalid Key');</script>";
			}
		}
		else
		{
			echo "<script>alert('Please fill key value to download selectd file');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Share File</title>
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
      <li class="active"><a href="notify.php" >Notifications</a></li>
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
		<h1>Download files with Key:</h1>
		<form action = "<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" enctype="multipart/form-data">
		<h4 style="text-align:center;">You are logined as <?=$_SESSION["username"]?></h4>
		<ul class="menu">
			<?php
			if($_SESSION["public"]==1)
			{
				$sql=$conn->query("Select * from upload where public=1 OR FIND_IN_SET('".$_SESSION["username"]."',`share_with`)");
				if($sql->num_rows>0)
				{
					while($row=$sql->fetch_assoc())
					{
						echo "<li>File: ".$row["file"]." <input type='text' name='key".$row["id"]."' placeholder='Enter Key for download'> <button type='submit' name='download' value='".$row["id"]."'>Download</button></li>";
					}
				}
				else
				{
					echo "<li class='center'>No files to download</li>";
				}
			}
			else
			{
				echo "<li class='center'>You are not a public profile</li>";
			}
			?>
		<ul>
	</form>
	</div>
  </div>


</div>

<script>
	function makeid() {
	var length=6;
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   document.getElementById("key").value=result;
}

</script>

</body>
</html>
