<?php
$con=mysqli_connect("vod.tv1.rw","api_access","Stuxnet7268");
if($con){
	$dbs=mysqli_select_db($con,"New_vod");
}else{

 die("error");
}

?>
