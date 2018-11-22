<?php 
require 'db.php';
include 'controllers/Web.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//get submitted data
	if(isset($_POST['id_article'])){
		//get id_article
		$id_article=$web->sanitize($_POST['id_article']);
		//check if article exists
		$status=$web->checkArticle($id_article);
		if($status){
			//now update article views
			$status=$web->view_count($id_article);
			if($status){
				echo "1";
			}else{
				echo "string";
			}
		}else{
			$web->showError("error","Article not exists");
		}
	}else{
		$web->showError("error","Please submit article id");
	}
}else{
	$web->showError("error","Please check submitted data");
}
?>