<?php 
include "../db/config.php";
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>

 <?php 
$query = mysqli_query($con, "SELECT id,username,profile_photo FROM users WHERE status='1' && id!='$id'");
while($row = mysqli_fetch_assoc($query)){
	$u_id = $row['id'];
	$uname = $row['username'];
	$photo_database = $row['profile_photo'];
	if ($photo_database == "") {
	
		$display_p = "default.png";

	}else{
 
 	$display_p = "user_photos/".$photo_database;

	}
?>
<style type="text/css">
	#user{
		color:#FFF;
		border: 1px solid #3498db; 
		background-color: #3498db;
		margin-top: 12px; 
		border-radius: 20px; 
		text-align:center;
		height:auto; 
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 10px;
		padding-right: 10px;
		display:block; 
		float: right;
		margin-right: 15px;
	}
	#img{
		float: left;
		margin-left: 10px;
		text-align:center;
		display: inline;
	}



	#else{
		display: inline;
		float: left;
		margin-left: 10px;
		color:#0F090A;
		background-color: #EEE;
		margin-top: 12px; 
		border-radius: 20px; 
		padding-top: 5px;
		padding-bottom: 5px;
		height:auto; 
		padding-left: 10px;
		padding-right: 10px; 
		display:block; 
		width:auto;
		margin-top: 8px;	
	}
</style>
		<div id="data">
		<?php if($u_id == $id || $uname == $username){?>
		<?php }else{?>
			<div id="others">
			<div id="img">
			<span><img src="<?php print $display_p; ?>" height="50px;" style="border-radius: 50%;max-width: 50px;min-width: 50px;"></span>
			</div>
			<div id="else">
		     <span><?php echo $uname;?></span>
		    </div>
		    </div>
		    <br />
		<br />
		<br />
		    <?php } ?>
		</div>

<?php }; ?>