<?php include "../db/config.php"; 
session_start();
$username = $_SESSION['username'];
?>
<?php 
if($_POST['changeusername'] != ""){
	$changeusername = $_POST['changeusername'];

	$query = mysqli_query($con,"SELECT username FROM users WHERE username='$changeusername'");
	$num = mysqli_num_rows($query);
	if($num == 1){
		echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Username is already taken</div>";
	}else{

	$q = mysqli_query($con,"UPDATE users SET username='$changeusername' WHERE username='$username'");
	if($q){	
	echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Username is updated</div>";
		}
	}
}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please enter new username</div>";
}

 ?>