<?php  include "db/config.php"; 
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<?php if(!isset($_SESSION['username'])){ ?>
<div id="nav">
	<div id="logo">
		<a href="index.php">Envoy</a>
	</div>
	<?php }else{ $username = $_SESSION['username']; ?>
	<div id="nav1">
	<div id="logo1">
		<a href="index.php">Envoy</a>
	</div>
	<div id="links">
		<a href="settings.php"><img src="settings1.png" height="35px;"></a>
		<div id="special">
			<a href="logout.php">Logout</a>
			<a href="message.php">Message</a>
		</div>		

	</div>
	</div>
	<?php } ?>
</div>