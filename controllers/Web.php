<?php 
include_once 'Query.php';
class Web extends Query{
	public function checkArticle($id_article){
		global $con;
		$status=false;
		$query="SELECT id_article FROM spip_articles 
				WHERE id_article=\"$id_article\"
				LIMIT 1";
		$rows=$this->rows($con,$query);
		if($rows>0){
			$status=true;
		}else{
			$status=false;
		}

		return $status;
	}

	//function to increment article view count
	public function view_count($id_article){
		global $con;
		$view=0;
		$query="SELECT visites FROM spip_articles
				WHERE id_article=\"$id_article\"
				LIMIT 1";
		$result=array();
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$view=(int)$value['visites'];
		}
		$view=$view+1;
		//now update record
		$query="UPDATE spip_articles SET visites=\"$view\"
				WHERE id_article=\"$id_article\" LIMIT 1";
		$status=$this->update($con,$query);
		return $status;
	}
	//function to show json errors
	public function showError($type,$message){
		$errors[]=array("status"=>"error","type"=>$type,"message"=>$message);
		$info=array("result"=>$errors);
		//display json based data
		header('Content-Type: application/json');
		echo json_encode($info);

	}
	//function to validate login
	public function sanitize($str){
		global $con;
		$invalid_characters = array("$", "%", "#", "<", ">", "|");
		$str = str_replace($invalid_characters, "", $str);
		$str=mysqli_real_escape_string($con,$str);
		return $str;
	}
}
$web=new Web();
?>