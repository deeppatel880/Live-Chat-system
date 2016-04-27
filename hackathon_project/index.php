<?php include"nav.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Messenger - Log In or Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
         <script type="text/javascript">
         	$(document).ready(function(){
         		$("#login").click(function(){
         			var username = $("#username").val();
         			var password = $("#password").val();
         			$.post("verify/checklogin.php",{username:username,password:password},function(data){
         				$("#data").html(data).addClass('animated flipInX');
         				if (data == "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please provide login information</div>" || data == "<div style='text-align: center; background: #e74c3c; padding:10px; color:white;'>Wrong username or password</div>"){
         					$("#log").effect('shake',{times:4}, 500);

         				}else{
         					location.reload(true);
         					$('#data').removeClass('animated flipInX');
         				}
         			});
         			return false;
         		});
         		$("#sign").click(function(){
         			var susername = $("#susername").val();
         			var spassword = $("#spassword").val();
         			var confirmpass = $("#confirmpass").val();
         			$.post("verify/checksignup.php",{susername:susername,spassword:spassword,confirmpass:confirmpass},function(data){
         				$("#data").html(data).addClass('animated flipInX');;
         				if (data ==  "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please sign up form</div>" || data == "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Username is already taken</div>" || data == "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Passwords should match</div>"){
         					$("#signup").effect('shake',{times:4}, 500);
         				}else{
         					location.reload(true);
         					$('#data').removeClass('animated flipInX');
         				}
         			});
         			return false;
         		});
         	});
         </script>
</head>
<body>
<?php if(!isset($_SESSION['username'])){ ?>
<div id="data"></div>
<div id="log">
	<h3>Log In</h3>
	<form action="" method="post">
		<input type="text" id="username" name="username" placeholder="Username"></input><br>
		<input type="password" id="password" name="password" placeholder="Password"></input><br><br><br>
		<input type="submit" id="login" name="login" value="Log In"></input>
	</form>
</div>
<div id="signup">
    	<h3>Sign Up</h3>
    	<form action="" method="post">
    		<input type="text" name="susername" id="susername" placeholder="Choose a Username"></input><br>
    		<input type="password" name="spassword" id="spassword" placeholder="Choose a password"></input><br>
    		<input type="password" name="confirmpass" id="confirmpass" placeholder="Re-enter password"></input><br><br><br>
    		<input type="submit" name="signup" id="sign" value="Sign Up"></input>
    	</form>
    </div>
<?php }else{ header("location: message.php");} ?>    
</body>
</html>