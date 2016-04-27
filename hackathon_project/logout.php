<?php include "db/config.php"; 
session_start();
$id = $_SESSION['id'];
$status = mysqli_query($con,"UPDATE users SET status='0' WHERE id='$id'");
session_destroy();
header("location:index.php");
?>