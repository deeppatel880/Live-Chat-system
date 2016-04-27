<?php include"../db/config.php"; 
session_start();
?>
<?php 
if(!empty($_POST['susername']) && !empty($_POST['spassword']) && !empty($_POST['confirmpass'])){
	$username = $_POST['susername'];
	$password = $_POST['spassword'];
	$confirmpass = $_POST['confirmpass'];
	if($password == $confirmpass){
		$query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$num = mysqli_num_rows($query);
		if($num == 1){
			echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Username is already taken</div>";
		}else{
			$md5pass = md5($password);
			$q = mysqli_query($con,"INSERT INTO users(username,password,status) VALUES('$username','$md5pass','1')");
			if ($q) {
				echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been successfully created</div>";
				$fetch = mysqli_fetch_assoc($q);
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $fetch['id'];
				$_SESSION['profile_photo'] = $fetch['profile_photo'];
			}
		}
	}else{
		echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Passwords should match</div>";
	}

}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please sign up form</div>";
}


 ?>