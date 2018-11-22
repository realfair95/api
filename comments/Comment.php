<?php 

class Comment{

	//function to save comment
	function save_comment($id_thread,$id_objet,$title,$name,$email,$body){
		global $con;
		$statut;
		$date=date("Y-m-d h:i:s");
		$query=mysqli_query($con,"INSERT INTO spip_forum(id_forum,id_objet,objet,id_parent,id_thread,titre,texte,auteur,email_auteur,nom_site,url_site,statut,ip,maj,mobile,id_auteur,notification,notification_email,composition,composition_lock,date_heure,date_thread)
			VALUES(\"$id_thread\",'$id_objet','article','0','$id_thread','$title','$body','$name','$email','','','publie','NULL','','yes','0','1','','','0','$date','$date')");
		if($query){
			$statut=true;
		}else{
			$statut=mysqli_error($con);
		}

		return $statut;
	}

	//function to load comment on an article
	function load_comments($id_object){
		global $con;
		$comments=array();
		 $query=mysqli_query($con,"SELECT * FROM spip_forum WHERE id_objet='$id_object' ORDER BY id_forum DESC");
		 if($query){
		 	if(mysqli_num_rows($query)>0){
		 		while($data=mysqli_fetch_assoc($query)){
		 			$comments[]=$data;
		 		}
		 	}
		 }else{
		 	die(mysqli_error($con));
		 }
		 return $comments;
	}

	//function to get new id thread
	function get_id(){
		$new_id;
		global $con;

		$result=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM spip_forum ORDER BY id_forum DESC LIMIT 1"));
		$id=(int)$result[0];
		$new_id=$id+1;
		return $new_id;
	}
}
//instantiate object of class Comment
$comment=new Comment();
?>