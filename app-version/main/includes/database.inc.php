<?php
$con=mysqli_connect("localhost","root","");
if($con){
	$db=mysqli_select_db($con,"tv1");
	if($db){
		//echo "connected";
	}
}else{
$con=mysqli_connect("vod.tv1.rw","api_access","Stuxnet7268");
if($con){
	$db=mysqli_select_db($con,"New_vod");
}else{

 die("error");
}	
}


?>
