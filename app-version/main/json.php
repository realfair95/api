<?php 
require("db.php");
$query=mysqli_query($con,"SELECT * FROM app_Version WHERE admin='' AND status='published' ORDER BY id DESC LIMIT 1");
if($query){
while($r=mysqli_fetch_array($query)){
    $id=$r[0];
    $versionCode=$r[1];
    $versionName=$r[2];
    $texte=$r[3];
    $update_url=$r[4];
    $status=$r[5];
    $update_date=$r[6];
    $result[]=array("versionCode"=>$versionCode,"versionName"=>$versionName,"description"=>$texte,"updateDate"=>$update_date);
}
$info=array("data"=>$result);
header('Content-Type: application/json');
echo json_encode($info);
}else{
	die("Error");
}
?>