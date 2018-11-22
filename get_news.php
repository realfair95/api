<?php 
$request=$_SERVER["REQUEST_METHOD"];
if($_SERVER["REQUEST_METHOD"]=="POST" || $_SERVER["REQUEST_METHOD"]=="GET"){
   if(isset($_POST['action']) || isset($_GET['action'])){
   	if(isset($_POST['category']) || isset($_GET['category'])){
     if($request=="POST"){
      $search=htmlentities(strip_tags($_POST['category']));
      $_POST['action']($search);
    }elseif($request=="GET"){
      $search=htmlentities(strip_tags($_GET['category']));
      $_GET['action']($search);
    }
   	}else{
		showErrors("Please check submitted data");
   	}
   }else{
   	showErrors("READ API DOCUMENTATION");
   }
}
function search_news($search)
{   
    require("db.php");
    mysqli_query($con,'SET CHARACTER SET utf8');
    $query=mysqli_query($con,"SELECT DISTINCT * FROM spip_articles WHERE (id_secteur=1 AND id_rubrique='$search')  AND ((id_rubrique!=19 AND id_rubrique!=23)AND statut='publie') ORDER BY date DESC LIMIT 20");
    
        if($query)
        {      
        	if(mysqli_num_rows($query)>0){
            while($r=mysqli_fetch_array($query)){
                $id=$r[0];
                $imgUrl="";
                $id_rubrique=$r[4];
                $post=$r[7];
                $postCategory="";
                $postTime=$r[9];
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
                $video[]=array("postId"=>"$r[0]", "postTitle"=>"$r[2]","poster"=>"Tv1","post"=>"$post", "postTime"=>"$postTime", "views"=>"$r[15]","postImage"=>"http://tv1.rw/IMG/$imgUrl","category"=>"$postCategory");
                $vid = array("data" => $video);                     
            }
            header('Content-Type: application/json');
            $vid=json_encode($vid);
            print_r($vid);
        	}else{
        		showErrors("Ibyo mwashatse ntibibashije kuboneka");
        	}
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

function showErrors($error){
	$errors[]=array("status"=>"errors","message"=>$error);
	$info=array("result"=>$errors);
	header('Content-Type: application/json');
	echo json_encode($info);
}


?>