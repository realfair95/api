<?php
if(isset($_POST['title']) && isset($_POST['description'])){
	//include other modules
	require '../class_loader.php';
	$title=$user->sanitize($_POST['title']);
	$description=$user->sanitize($_POST['description']);
	$category=$user->sanitize($_POST['category']);

	echo "works";
}else{
	echo "errors";
}

?>