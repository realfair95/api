<?php 
require 'core/Comment.php';
include 'core/Functions.php';
error_reporting(0);
$request = array_merge($_GET, $_POST);
$response=array();
$server_request=$_SERVER['REQUEST_METHOD'];
$action = $request['action']??"";
if($action=="add_comment"){
	$id_object=$function->sanitize(($request['id_object']??""));
	$title=$function->sanitize(($request['title']??""));
	$name=$function->sanitize(($request['name']??""));
	$email=$function->sanitize(($request['email']??""));
	$body=$function->sanitize(($request['body']??""));
	$id_thread=$comment->get_id();
	//check first data brougth here
		// echo 'Name: '.$name;
		// die();
	if(strlen($id_object)>0 && strlen($name)>=3 && strlen($body)>=3){
		$data=$comment->save_comment($id_thread,$id_objet,$title,$name,$email,$body);
		if($data){
			$user_string="igitekerezo cyawe kiragaragara ku rubuga nyuma yo gusuzumwa n'abakozi ba TV1.";
			$comment->showError(true,$user_string);
		}else{
			echo $data;
			//showError("fatal","Something went wrong please try again later");
		}
	}else{
		//show errors
		$comment->showError(false,"Please enter all required information well.");
	}
}else{
	$comment->showError(false,"No Action Specified");
}

?>