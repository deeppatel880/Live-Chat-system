<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
 ?>

 <?php 
if(isset($_POST['username'])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 =$_POST["password2"];

        
        if( !empty($username) && !empty($password2)&& !empty($password)){
        	if($password == $password2){
                
                
        		$password3 = md5($password2);    
                $run = mysqli_query($con,"SELECT * FROM users WHERE username='$username' LIMIT 1");
                $check = mysqli_num_rows($run);

                if($check == 0){

        		$sql = "INSERT INTO users VALUES('','$username','$password3')";
                $query = mysqli_query($con,$sql);
        		

                if($query){
                	echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been successfully created</div>";
                    $_SESSION['username'] = $username;
                }
            }else{
                echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Username is already taken</div>";
            }



        	}
        	else{
        		echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Your passwords should match</div>";
        	}
        }
        else{
         echo "<div style='text-align: center; background: #e74c3c; padding:10px; color:white;'>Please fill the form</div>";
        }
        
}
?>



