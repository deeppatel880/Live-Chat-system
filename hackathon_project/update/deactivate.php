<?php 
include "../db/config.php";
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>
 <?php 
if(!empty($_POST['oldpassword1'])){
 $oldpassword1 = $_POST['oldpassword1'];

 $dbpass = mysqli_query($con,"SELECT password FROM users WHERE id='$id'");
 if($dbpass == md5($oldpassword1)){
 	$query = mysqli_query($con,"DELETE FROM users WHERE id='$id'");
 	if($query){
 	echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>account has been deactivated</div>";
 		}
 }
 else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Incorrect password</div>";
}

}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please enter password to deactivate this account</div>";
}




  ?>