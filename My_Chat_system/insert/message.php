<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>
 <?php 
if(!empty($_POST["message"])){
$message = $_POST["message"];
$query = mysqli_query($con, "INSERT INTO msg VALUES('','$id','$username','$message')");
}else{

}
  ?>