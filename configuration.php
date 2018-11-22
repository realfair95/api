<?php
$con=mysqli_connect("localhost","root","2016!Kongolo!");
if($con){
	$db=mysqli_select_db($con,"Web");
	if($db){
		echo "connected";
	}else{
		mysql_error($con);
	}
}else{

 die("error");
}

?>