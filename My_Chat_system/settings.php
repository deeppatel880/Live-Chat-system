<?php include 'nav_bar/nav.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings - <?php echo $username; ?></title>
	<link rel="stylesheet" type="text/css" href="settings.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
         <script type="text/javascript">
         	$(document).ready(function(){
         		$("#submit").click(function(){
         			
         			var changeusername = $('#changeusername').val();
         			$.post("Verify/checkusername.php",{changeusername:changeusername},function(data){
         				$('#results').html(data);
 							if(data == "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Username has been Changed</div>"){
 								location.reload(true);
 							}else{
 								$('#changeuser').effect("shake",{times: 4}, 600);
 							}


         			})
         			return false;
         		});

         		$("#submit1").click(function(){
         			var oldpassword = $("#oldpassword").val();
         			var newpassword = $("#newpassword").val();
         			var confirmpassword  = $("#confirmpassword").val();

         			$.post("Verify/checkpassword.php", {oldpassword:oldpassword,newpassword:newpassword,confirmpassword:confirmpassword}, function(data){
         				$("#results").html(data);
         				if(data == "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>password has been updated</div>"){
 								location.reload(true);
 							}else{
 								$('#changepass').effect("shake",{times: 4}, 600);
 							}

         			});
         			return false;
         		});
         		$("#deactivate").click(function(){
         			var oldpassword1 = $("#oldpassword1").val();
         			$.post("Verify/deactivate.php", {oldpassword1:oldpassword1},function(data){
         				$("#results").html(data);
         				if(data == "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been deactivated</div>"){
         					location.reload();
         				}else{
         					$('#deactivate1').effect("shake",{times: 4}, 600);
         				}

         			});
         			return false;
         		});
         		$("#range").change(function(){
         			var slider = $("range").val();
         			$.post("messege.php",{slider:slider},function(){
         				$("#data").html("<p style='color:#3498db;'>Refresh time Interval has been updated</p>")
         			});
         			return false;
         		});
         	});
         </script>
         <?php 

          ?>
</head>
<body>
<?php if(!isset($username)){header("location: index.php") ?>
<?php } else{ ?>
<div id="results"></div>
<h3> Settings - <?php echo strtoupper($username) ?></h3>
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
</html>