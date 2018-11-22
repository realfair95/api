<?php 
getLatest();


function getLatest(){
	require("vod_db.php");

	$query=mysqli_query($con,"SELECT * FROM videos WHERE type='video' ORDER BY id DESC LIMIT 20");
	if($query){
		while($r=mysqli_fetch_array($query)){
			$id=$r[0];
			$title=$r[1];
			$description=$r[3];
			$views=$r[4];
			$created=formatDate($r[6]);
            $SD_format="http://vod.tv1.rw/videos/".$r[10]."_SD.mp4";
            $LOW_format="http://vod.tv1.rw/videos/".$r[10]."_Low.mp4";
			$filename=$LOW_format;
            $poster="http://vod.tv1.rw/videos/".$r[10]."_thumbs.jpg";
			$duration=$r[11];

			$videos[]=array("id"=>$id,"title"=>$title,"description"=>$description,"views"=>$views,"created"=>$created,"filename"=>$filename,
                "poster"=>$poster,"duration"=>$duration);
			$data=array("videos"=>$videos);
		}
		header('Content-Type: application/json');
		echo json_encode($data);


	}else{
		die(mysqli_error($con));
	}

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