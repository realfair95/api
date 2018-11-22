<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../db.php';
	include 'Comment.php';

	$id_object=mysqli_real_escape_string($con,$_POST['id_object']);
	$title=mysqli_real_escape_string($con,$_POST['title']);
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$body=mysqli_real_escape_string($con,$_POST['body']);
	$id_thread=$comment->get_id();
	//check first data brougth here
	if(strlen($id_thread)>0 && strlen($name)>=3 && strlen($body)>=3){
		$data=$comment->save_comment($id_thread,$id_objet,$title,$name,$email,$body);
		if($data){
			//comment successfully added
			showMessage("Comment added successfully");
		}else{
			echo $data;
			//showError("fatal","Something went wrong please try again later");
		}
	}else{
		//show errors
		showError("information","Please enter all required information well.");
	}
}

function add_comment($id_object,$id_thread,$title,$name,$email,$body){

}

//show success message in json if comment added successfully.
function showMessage($message){
	$messages[]=array("status"=>"success","extra"=>"no","message"=>$message);
	$info=array("result"=>$messages);
	//display json based data
	header('Content-Type: application/json');
	echo json_encode($info);
}

//show error on either platform or data formatted
function showError($type,$message){
	$errors[]=array("status"=>"error","type"=>$type,"message"=>$message);
	$info=array("result"=>$errors);
	//display json based data
	header('Content-Type: application/json');
	echo json_encode($info);

}

?>