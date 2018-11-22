<?php
$con=mysqli_connect("localhost","root","2016!Kongolo!");
if($con){
	$db=mysqli_select_db($con,"Web");
}else{

 die("error");
}

?>