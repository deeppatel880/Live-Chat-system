<?php 
include "../db/config.php";
session_start();
 ?>
<?php 
if(!empty($_POST["username"] && !empty($_POST["password"]))){
	$username = $_POST["username"];
	$password = $_POST['password'];
	$md5pass = md5($password);
	$query = mysqli_query($con,"SELECT * FROM users WHERE username='$username' && password='$md5pass'");
	$num = mysqli_num_rows($query);
	$fetch = mysqli_fetch_assoc($query);

	if ($num == 1) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $fetch['id'];
		$id = $fetch['id'];
		$_SESSION['profile_photo'] = $fetch['profile_photo'];
		$status = mysqli_query($con,"UPDATE users SET status='1' WHERE id='$id'");
	} else {
		echo "<div style='text-align: center; background: #e74c3c; padding:10px; color:white;'>Wrong username or password</div>";
	}
	

}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please provide login information</div>";
     exit();
}



 ?>