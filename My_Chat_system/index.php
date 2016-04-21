<?php include'nav_bar/nav.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Envoy</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
          $('#log').click(function(){
          	var username = $('#username').val();
          	var password = $('#password').val();
          	$.post('Verify/checklogin.php',{username: username, password: password},function(data){
          		$('#results').html(data);
          		if (data == "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please provide login information</div>" || data == "<div style='text-align: center; background: #e74c3c; padding:10px; color:white;'>Wrong username or password</div>") {
          			$('#login').effect("shake",{times: 4}, 600);
          		}
          		else{
          			location.reload(true);
          		}
          		
          	});
          	return false;
          });
          $('#sign').click(function(){
          	var username = $('#susername').val();
          	var password = $('#spassword').val();
          	var password2 = $('#confirmpass').val();
          	$.post('Verify/checksignup.php',{username: username, password: password, password2:password2},function(data){
          		$('#results').html(data);
          		if (data == "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been successfully created</div>") {
          			location.reload(true)
          		}else{
          			
          			$('#signup').effect("shake",{times: 4}, 600);
          		}
          	});
          	return false;
          });
      });
	</script>
</head>
<body>
<?php if(!isset($_SESSION['username'])){ ?>
<div id="results"></div>
	<div id="login">
		<h3>Log In</h3>
		<form action="" method="post" >
			<input type="text" name="username" id="username" placeholder="Username"></input><br>
			<input type="password" name="password" id="password" placeholder="Password"></input><br>
			<input type="submit" name="login" id="log" value="Log In"></input>
		</form>
	</div>
    <div id="signup">
    	<h3>Sign Up</h3>
    	<form action="" method="post">
    		<input type="text" name="susername" id="susername" placeholder="Choose a Username"></input><br>
    		<input type="password" name="spassword" id="spassword" placeholder="Choose a password"></input><br>
    		<input type="password" name="confirmpass" id="confirmpass" placeholder="Re-enter password"></input><br>
    		<input type="submit" name="signup" id="sign" value="Sign Up"></input>
    	</form>
    </div>
 <?php }else{ header("location: messege.php");} ?>   
</body>
</html>