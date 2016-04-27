<?php include "nav.php"; 
if(isset($_FILES['file'])){
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$temp = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];

        if($error != 0){
        	die("error uploading file! code $error.");
        }
     	else{

		if($size <= 2500000 && $type == "image/jpeg" || $type == "image/png" || $type == "image/jpg" || $type == "video/mp4" || $type == "video/flv" || $type == "video/avi" || $type == "video/wmv"){
			move_uploaded_file($temp, "user_photos/".$name);
			$query = mysqli_query($con,"UPDATE users SET profile_photo='$name' WHERE username='$username'");
			header("location: settings.php");
    		 }
    	else{
			echo "<div style='text-align:center; margin-top 30px; background:#e74c3c; padding: 20px;'>The file size is too large or file type isn't supported</div>";
			move_uploaded_file($temp, "chat_update/user_photos".$name);
			}
		}
	}
$check_profile_photo = mysqli_query($con, "SELECT profile_photo FROM users WHERE username='$username'");
$fetch = mysqli_fetch_assoc($check_profile_photo);
$photo_database = $fetch['profile_photo'];
if ($photo_database == "") {
	
	$display_p = "default.png";

}else{
 
 $display_p = "user_photos/".$photo_database;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings - <?php echo strtoupper($_SESSION['username']); ?></title>
	<link rel="stylesheet" type="text/css" href="css/settings.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
         <script type="text/javascript">
         $(document).ready(function(){
         	$("#submit").click(function(){
         		var changeusername = $("#changeusername").val();
         		$.post("update/changeusername.php",{changeusername: changeusername},function(data){
         			$("#data").html(data).addClass('animated rubberBand');
         		if(data != "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Username is updated</div>")	{
         			$("#changeuser").effect('shake',{times:4}, 500);
         			}
         			else{
         				$('#data').removeClass('animated rubberBand');
         			}
         		});
         		return false;
         	});
         	$("#submit1").click(function(){
         			var oldpassword = $("#oldpassword").val();
         			var newpassword = $("#newpassword").val();
         			var confirmpassword  = $("#confirmpassword").val();

         			$.post("update/changepassword.php", {oldpassword:oldpassword,newpassword:newpassword,confirmpassword:confirmpassword}, function(data){
         				$("#data").html(data).addClass('animated rubberBand');
         				if(data != "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>password has been updated</div>"){
 								$("#changepass").effect('shake',{times:4}, 500);
 							}else{
 								$('#data').removeClass('animated rubberBand');
 							}
         			});
         			return false;
         		});
         		$("#deactivate").click(function(){
         			var oldpassword1 = $("#oldpassword1").val();
         			$.post("update/deactivate.php", {oldpassword1:oldpassword1},function(data){
         				$("#data").html(data).addClass('animated rubberBand');
         				if(data != "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>account has been deactivated</div>"){
         					$('#deactivate1').effect("shake",{times: 4}, 600);
         				}else{
         					$('#data').removeClass('animated rubberBand');
         				}

         			});
         			return false;
         		});
         })
         </script>
</head>
<body>
</div><?php if(!isset($username)){header("location: index.php") ?>
<?php } else{ ?>
<div id="data"></div>
<h3> Settings - <?php echo strtoupper($username) ?></h3>
<div id="profile_photo">
<h4>Update Profile Photo</h4>
<img src="<?php echo $display_p; ?>" height="250px" width="250px;">
	<form  action="" method="Post" enctype="multipart/form-data">
		<div class="input">
		<br/>
		<input type="file" name="file"></input><br/><br/>
		<input type="submit" name="submit" value="upload" id="login"></input>
	</div>
	</form>
</div>
<br/><br/>
<div id="changeuser">
	<h4>Change Username</h4>
	<form action="" method="post">
		<input type="text" name="changeusername" id="changeusername" placeholder="New Username"></input>
		<input type="submit" name="submit" id="submit" value="Change Username"></input>
	</form>
</div>
<div id="changepass" style="margin-top: 30px;">
	<h4>Change Password</h4>
	<form action="" method="post">
		<input type="password" name="oldpassword" id="oldpassword" placeholder="Old Password"></input>
		<input type="password" name="newpassword" id="newpassword" placeholder="New Password" style="margin-top: 10px;"></input>
		<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Re-enter New Password" style="margin-top: 10px;"></input>
		<input type="submit" name="submit1" id="submit1" value="Change Password"></input>
	</form>
</div>	
<div id="deactivate1" style="margin-top: 30px; padding: 5px; padding-bottom: 2px; ">
	<form action="" method="post">
		<input type="password" name="oldpassword1" id="oldpassword1" placeholder="Password"></input>
		<input type="submit" name="deactivate" id="deactivate" value="Deactivate Account"></input>
	</form>
</div>
</body>
<?php } ?>

</body>
</html>