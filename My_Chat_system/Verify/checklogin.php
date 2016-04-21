<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
 ?>
<?php if(isset($_POST['username'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password3 = md5($password);
     if(!empty($username) && !empty($password)) {  
      $log = "SELECT * FROM users WHERE username='$username' AND (password='$password3' OR password='$password') LIMIT 1";
      $query = mysqli_query($con,$log); 
      $get = mysqli_fetch_assoc($query);
      $get2 = mysqli_num_rows($query);

      if ($get2 == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $get["id"];
      } else {
      	echo "<div style='text-align: center; background: #e74c3c; padding:10px; color:white;'>Wrong username or password</div>";
      }
  }else{
     echo "<div style='text-align: center; background: #e74c3c; padding:10px; color: white;'>Please provide login information</div>";
     exit();
	} 
  } ?>