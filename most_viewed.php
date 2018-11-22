<?php
getTopStories();

//get top videos
function getTopStories()
{	
	require("db.php");
	mysqli_query($con,'SET CHARACTER SET utf8');
	$query=mysqli_query($con,"SELECT DISTINCT * FROM spip_articles WHERE id_secteur=1  AND ((id_rubrique!=19 AND id_rubrique!=23) AND (statut='publie' AND visites>=200)) ORDER BY date DESC LIMIT 50");
						  
		if($query)
		{      
			while($r=mysqli_fetch_array($query)){
				$id=$r[0];
				$imgUrl="";
				$id_rubrique=$r[4];
				$post=formatData($r[7],"iframe");
				$postCategory="";
				$postTime=formatDate($r[19]);
 				$views=$r[15];
	 		        $query1=mysqli_query($con,"SELECT * FROM  spip_documents_liens WHERE id_objet='$id'");
				if(mysqli_num_rows($query1)>0){
	 		        while($data=mysqli_fetch_array($query1)){
	 		          $imgId=$data[0];
	 		          $q=mysqli_query($con,"SELECT * FROM  spip_documents WHERE id_document='$imgId'");
	 		          while($a=mysqli_fetch_array($q)){
	 			       $imgUrl=$a[6];   	 				     
	 		          }
	 		        }
	 		        }
	 		        //select the news category
	 		        $category=mysqli_query($con,"SELECT * FROM spip_rubriques WHERE id_rubrique='$id_rubrique'");
	 		        if($category){
	 		         while($row=mysqli_fetch_array($category)){
	 		           $postCategory=$row[2];
	 		         }
	 		        }
				$video[]=array("postId"=>"$r[0]", "postTitle"=>"$r[2]","poster"=>"Tv1","post"=>"$post", "postTime"=>"$postTime", "visites"=>"$r[17]","postImage"=>"http://tv1.rw/IMG/$imgUrl","category"=>"$postCategory","views"=>$views);
				$vid = array("data" => $video); 	 		        
			}
		
		header('Content-Type: application/json');
		$vid=json_encode($vid);
		 print_r($vid);
		//$error=json_last_error();
		//echo $error;
		}
		else
		die(mysqli_error($con));
}
function formatData($haystack, $needle){
	if (strpos($haystack, $needle) !== false) 
	{
	$position=strpos($haystack, $needle);
	$final_string=substr($haystack,0,($position-1));
	}else{
	$final_string=($haystack);
	}
	return $final_string;
}

function clean($string) {
   //$string = str_replace(',', ',', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
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
?>
