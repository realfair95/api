<?php 
require 'class_loader.php';
// $first_content=array();
// $first_content=$user->get_app_first_contents();
// var_dump($first_content);
$title="Homeland of tech";
$body="Homeland of tech";
$category="Homeland of tech";
$image="Homeland of tech";
$save_status=$user->save_app_first($title,$body,$category,$image);
if($save_status){
	echo "saved";
}else{
	die(mysqli_error($con));
}
?>