<?php $host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
$username = $_SESSION['username']; 
?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
    <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<?php 
if(!empty($_POST['oldpassword1'])){
	$oldpassword1 = $_POST['oldpassword1'];
	$query = mysqli_query($con,"SELECT password FROM users WHERE username='$username'");
	$row = mysqli_fetch_assoc($query);

		$oldpassworddb = $row['password'];
		if($oldpassworddb == md5($oldpassword1) || $oldpassword1 == $oldpassworddb){
			$q = mysqli_query($con, "DELETE FROM users WHERE username='$username'");
			if($q){
				echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been deactivated</div>";
				header("location:logout.php")
				?>

				<script type="text/javascript">
					$(document).ready(function(){
						location.reload();
					});
				</script>
				<?php
			}
		}else{
			echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Old password doesn't match</div>";
		}	
}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Please enter password in order to deactivate</div>";
}




 ?>