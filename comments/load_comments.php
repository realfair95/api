<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['id_object'])){
   	 $id_object=htmlentities(strip_tags($_POST['id_object']));
require '../db.php';
include 'Comment.php';
$data=array();
$data=$comment->load_comments($id_object);

//check if there are comments in array
//var_dump($data);
if(count($data)>0){
	foreach ($data as $key => $value) {
		# code...
		$json[]=array("name"=>$value['auteur'],"comment"=>$value['texte'],"date"=>formatDate($value['date_heure']));
	}
	$vid = array("data" => $json);
	header('Content-Type: application/json');
	$vid=json_encode($vid);
	print_r($vid); 
}else{
	echo "0";
}
   	}else{
   		showErrors("Please check data");
   	}
   }else{
   	showErrors("READ API DOCUMENTATION");
   }

   function get_comments($id_object){

   }


function formatDate($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function showErrors($error){
	$errors[]=array("status"=>"errors","message"=>$error);
	$info=array("result"=>$errors);
	header('Content-Type: application/json');
	echo json_encode($info);
}
?>