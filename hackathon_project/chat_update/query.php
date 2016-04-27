<?php 
include "../db/config.php";
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>

 <?php 
 $query = mysqli_query($con, "SELECT * FROM message ORDER BY id ASC");
while($row = mysqli_fetch_assoc($query)){

	$user_id_q = mysqli_query($con, "SELECT user_id FROM message WHERE id!='$id'");
	while($user_id_f = mysqli_fetch_assoc($user_id_q)){
	$user_id_o = $user_id_f['user_id'];

		$photo_q = mysqli_query($con,"SELECT profile_photo FROM users WHERE id='$user_id_o'");
		while($photo_f = mysqli_fetch_assoc($photo_q)){
			$photo_o = $photo_f['profile_photo'];
			if(empty($photo_o) || $photo_o == ""){
				$photo_d = "default.png";
			}
			else{
				$photo_d = "user_photos/".$photo_o;
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
		<?php if($row['user_id'] == $id || $row['username'] == $username){?>
		
			<div id="user">
		     <span><?php echo $row['msg']; ?></span>
		    </div>
		    <br />
		<br />
		<br />
		<?php }else{?>
			<div id="others">
			<div id="img">
			<span><img src="<?php print $photo_d; ?>" height="50px;" style="border-radius: 50%;max-width: 50px;min-width: 50px;"></span>
			</div>
			<div id="else">
		     <span><?php echo $row['username'];?>: </span>
		     <span><?php echo $row['msg']; ?></span>
		    </div>
		    </div>
		    <br />
		<br />
		<br />
		    <?php } ?>
		</div>
		<?php }; ?>
	<?php }; ?>
<?php };  ?>