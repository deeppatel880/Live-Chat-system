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
$query = mysqli_query($con, "SELECT * FROM msg ORDER BY id ASC");

while($row = mysqli_fetch_assoc($query)){
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
		margin-right: 10px;
	}
	#else{
		color:#FFF;
		border: 1px solid #3498db; 
		background-color: #3498db;
		margin-top: 12px; 
		border-radius: 20px; 
		text-align:center;
		padding-top: 5px;
		padding-bottom: 5px;
		height:auto; 
		padding-left: 10px;
		padding-right: 10px; 
		display:block; 
		float: left;
		width:auto;
		margin-left: 10px;
		margin-top: 0px;	
	}
</style>
		<div id="data">
		<?php if($row['id2'] == $id){?>
		<br />
		<br />
		<br />
			<div id="user">
		     <span><?php echo $row['msg']; ?></span>
		    </div>
		<?php }else{?>
		<br />
		<br />
		<br />
			<div id="else">
		     <span><?php echo $row['username'];?>: </span>
		     <span><?php echo $row['msg']; ?></span>
		    </div>
		    <?php } ?>
		</div>

<?php }; ?>