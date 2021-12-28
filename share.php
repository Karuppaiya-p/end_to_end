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
	$key_value="";
	if(isset($_POST["send"]))
	{
		if(is_uploaded_file($_FILES['Filedata']['tmp_name']))
		{
			if(isset($_POST["share_with"]))
			{
				$share_with=implode(",",$_POST["share_with"]);
			}
			if(isset($_POST["public"]))
			{
				$public=1;
			}
			$username=$_SESSION["username"];
			$key_value=$_POST["key"];
			$uploadDir ="upload/";
			$file_ext=pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
			$basefile=basename($_FILES['Filedata']['name'],".".$file_ext);
				$filename=$basefile.uniqid().".".$file_ext;
				$tempFile   = $_FILES['Filedata']['tmp_name'];
				$targetFile = $uploadDir.$filename;
				move_uploaded_file($tempFile, $targetFile);
				if($conn->query("insert into upload (`username`,`file`,`key_value`,`type`,`share_with`,`public`)VALUES('$username','$filename','$key_value','$file_ext','$share_with','$public')"))
				{
					echo "<script>location.replace('notify.php');</script>";
				}
		}
		else
		{
			$out="*Please give all inputs";
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
      <li class="active"><a href="share.php" >Share File</a></li>
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
		<h1>Upload your file with Key:</h1>
		<form action = "<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" enctype="multipart/form-data">
		<h4 style="text-align:center;">You are logined as <?=$_SESSION["username"]?></h4>
		Browse File<input type="file" name="Filedata">
		<label for="key"><h5>Key&nbsp;<button type="button" onclick="makeid()">Generate Key</button></h5></label>
		<input type="text" name="key" id="key" placeholder="Enter your key" required>
		<label for="share_with"><h5>File Share With</h5></label>
		<input type="checkbox" name="public" id="public"><label for="public">Everyone (or) Select User</label>
		<select name="share_with[]" id="share_with" multiple="multiple">
			<?php
				$sql=$conn->query("Select * from user where public=1");
				if($sql->num_rows>0)
				{
					while($row=$sql->fetch_assoc())
					{
						echo "<option value='".$row["username"]."'>".$row["username"]."</option>";
					}
				}
			?>
		</select>
		<input type="submit" name="send" value="upload">
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
