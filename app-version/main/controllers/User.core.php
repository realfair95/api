<?php 

include_once 'Query.php';

class User extends Query{

	################# GET APP FIRST INTRO CONTENT ###################
	public function get_app_first_contents(){
		global $con;
		$query="SELECT * FROM app_first 
				WHERE status!='DELETED'
				ORDER BY id DESC";
		$result=array();
		$result=$this->select($con,$query);
		return $result;
	}

	################## END OF GET APP FIRST INTRO CONTENT ############
	//function to return type of a user
	public function user_type($id){
		global $con;
		$query="SELECT * FROM user_admin WHERE id='$id' LIMIT 1";
		$result=array();
		$user_type='';
		$result=$this->select($con,$query);
		foreach ($result as $key => $value) {
			$user_type=$value['type'];
		}
		return $user_type;
	}

	//function to save app_first_content
	public function save_app_first($title,$body,$category,$image){
		global $con;
		$status=false;
		$update_query="UPDATE app_first SET status='PENDING'";
		$update_status=$this->update($con,$update_query);
		if($update_status){
			$query="INSERT INTO app_first(title,body,category,image,status) VALUES (\"$title\",\"$body\",\"$category\", \"$image\", 'ACTIVATED')";
			$status=$this->insert($con,$query);
		}else{
			$status=false;
		}
		return $status;
	}

	//function to sanitize user data
	public function sanitize($str){
		global $con;
		$invalid_characters = array("$", "%", "#", "<", ">", "|");
		$str = str_replace($invalid_characters, "", $str);
		$str=mysqli_real_escape_string($con,$str);
		return $str;
	}

	//function to activate and desactivate
	public function 
	
}
$user=new User();
?>