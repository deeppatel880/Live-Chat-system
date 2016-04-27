<?php include"nav.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Message - <?php echo strtoupper($username); ?></title>
	<link rel="stylesheet" type="text/css" href="css/messages.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
    <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
         <script type="text/javascript">
         $(document).ready(function(){  
         $("#online").hide(); 
         var height = $("#chats").prop("scrollHeight"); 
         $("#chats").animate({ scrollTop: height}, 500);
         	$(setInterval(function(){
         		$("#chats").load('chat_update/query.php');
         		$("#online").load('chat_update/online.php');
         		}, 700));
         		$("#send").click(function(){
         			var message = $("#message").val();
         			
         			$.post("chat_update/message.php", {message:message}, function(){
         				$("#message").val("");
         				$("#chats").animate({ scrollTop: height}, 500);
         			});
         			return false;
         		});	
         		$("#check").click(function(){
         			$("#online").toggle().addClass('animated slideInDown');
         			$("#check").addClass('animated slideInDown');
         		});
         	});	
         </script>
    
</head>
<?php if(!isset($username)){ header("location: index.php") ?> 
<?php  } else{ ?>
<body>
<div id="online">
</div>
<div id="check">
	Show Active users
</div>
<div id="chats">
</div>
<div id="userinput">
	<form action="" method="post">
		<input type="text" name="message" id="message" placeholder="Enter your message here"></input>
		<input type="submit" name="send" id="send" value="Send" ></input>
	</form>
</div>
</body>
<?php } ?>
</head>
</html>