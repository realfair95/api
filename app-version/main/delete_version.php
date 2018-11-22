<?php 
require("db.php");
if(isset($_POST['id'])){
	$id=$_POST['id'];
	//delete data
	$query=mysqli_query($con,"DELETE FROM app_Version WHERE id='$id' LIMIT 1");
	if($query){
		echo "1";
	}else{
		die(mysqli_error($con));
	}
}
?>