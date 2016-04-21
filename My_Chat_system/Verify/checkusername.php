<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
$username = $_SESSION['username'];
 ?>
 <?php 
if (!empty($_POST['changeusername'])) {
	$changeusername = $_POST['changeusername'];

	$query = mysqli_query($con,"SELECT * FROM users WHERE username='$changeusername' LIMIT 1");
	$get = mysqli_num_rows($query);

	if ($get == 1) {
		echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Username already taken</div>";
	}else{
		$query1 = mysqli_query($con, "UPDATE users SET username='$changeusername' WHERE username='$username'");
		if ($query1) {
			echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Username has been Changed</div>";
		}
	}

}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Please enter new username</div>";
}




  ?>