<?php 
require 'Query.php';
class Comment extends Query{

	//function to save comment
	function save_comment($id_thread,$id_objet,$title,$name,$email,$body){
		$date=date("Y-m-d h:i:s");
		$id_objet=(int)$id_objet;
		$query="INSERT INTO spip_forum(id_forum,id_objet,objet,id_parent,id_thread,titre,texte,auteur,email_auteur,nom_site,url_site,statut,ip,mobile,id_auteur,notification,notification_email,composition,composition_lock,date_heure,date_thread)
			VALUES(\"$id_thread\",'$id_objet','article','0','$id_thread','$title','$body','$name','$email','','','off','197.243.66.18','yes','0','1','','','0','$date','$date')";
		$statut=$this->insert($query);
		return $statut;
	}

	//function to load comment on an article
	function load_comments($id_object){
		$comments=array();
		$query="SELECT id_forum,id_objet,titre,date_thread,date_heure,texte,auteur,email_auteur FROM spip_forum
			WHERE id_objet='$id_object'
			AND statut='publie'
			ORDER BY id_forum DESC";
		$comments=$this->select($query);
		 return $comments;
	}

	//function to get new id thread
	public function get_id(){
		$new_id;
		$query="SELECT id_forum FROM spip_forum ORDER BY id_forum DESC LIMIT 1";
		$result=array();
		$result=$this->select($query);
		foreach ($result as $key => $value) {
			$id=(int)$value['id_forum'];
		}
		$new_id=$id+1;
		return $new_id;
	}
	public function showError($status,$message){
		$info=array("status"=>$status,"result"=>$message);
		//display json based data
		header('Content-Type: application/json');
		echo json_encode($info);

	}
}
//instantiate object of class Comment
$comment=new Comment();
?>