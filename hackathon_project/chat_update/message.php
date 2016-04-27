<?php 
include "../db/config.php";
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>
 <?php 
if(!empty($_POST["message"])){
$message = $_POST["message"];
$query = mysqli_query($con, "INSERT INTO message VALUES('','$id','$username','$message')");
}else{

}
  ?>