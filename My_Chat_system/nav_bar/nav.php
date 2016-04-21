<?php include 'config/config.php'; 
session_start();
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php if(!isset($_SESSION['username'])) {?>
<div class="nav">
	<div id="logo"><a href="index.php" >Envoy</a></div>
</div>
<?php } else{ $username = $_SESSION['username'];?>
<div id="nav">
	<div id="icon"><a href="index.php" >Envoy</a></div>
	<div id="links">
		<a href="messege.php" id="logout">Messages</a>
		<a href="logout.php" id="logout">Logout</a>
		<a href="settings.php"><img src="settings1.png" height="32px;" ></a>

	</div>
</div>
<?php } ?>
