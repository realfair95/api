<?php
require 'core/Comment.php';
include 'core/Functions.php';
$comments=$comment->load_comments(853);
foreach ($comments as $key => $value) {
	$date=$function->formatDate($value['date_heure']);
	$public_comments[]=array("date"=>$date,"post"=>$value['titre'],"author"=>$value['auteur'],"comment"=>$value['texte'],"commentId"=>$value['id_forum'],"postId"=>$value['id_objet']);
}
echo $comment->showError(true,$public_comments);
?>