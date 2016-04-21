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
if(!empty($_POST['oldpassword']) && !empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])){
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confirmpassword = $_POST['confirmpassword'];
	if($newpassword == $confirmpassword){

		$query = mysqli_query($con,"SELECT password FROM users WHERE username='$username'");
		$row = mysqli_fetch_assoc($query);

		$oldpassworddb = $row['password'];
		if($oldpassworddb == md5($oldpassword)){
			$q = mysqli_query($con, "UPDATE users SET password='$confirmpassword' WHERE username='$username'");
			if($q){
				echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>password has been updated</div>";
			}
		}else{
			echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Old password doesn't match</div>";
		}	

	}else{
		echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>New password and Re-enter new passwords should match</div>";
	}


}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Please enter password requirements</div>";
}







  ?>