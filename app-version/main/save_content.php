<?php 
require("db.php");
if(isset($_POST['save'])){
	$v_name=mysqli_real_escape_string($con,$_POST['v_name']);
	$v_code=mysqli_real_escape_string($con,$_POST['v_code']);
	$v_texte=mysqli_real_escape_string($con,$_POST['v_texte']);
	$v_id=mysqli_real_escape_string($con,$_POST['v_id']);
	//UPDATE STATUS OF OTHER VERSIONS
	$update=mysqli_query($con,"UPDATE app_Version SET status='unpublished'");
	if($update){
	//create query
	$query=mysqli_query($con,"INSERT INTO app_Version(versionCode,versionName,texte,update_url,status)VALUES
		('$v_code','$v_name','$v_texte','$v_id','published')");
	if($query){
		echo "Version Updated successfully";
	}else{
		die(mysqli_error($con));
	}
	}else{
		die(mysqli_error($con));
	}
}
?>