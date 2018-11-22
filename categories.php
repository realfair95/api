<?php 
$categories=array();
$categories[0]="Amafoto y'umunsi";
$categories[1]="Amahanga";
$categories[2]="Ibyegeranyo";
$categories[3]="Ikoranabuhanga";
$categories[4]="Imibereho y’abaturage";
$categories[5]="Imikino";
$categories[6]="Imyidagaduro";
$categories[7]="Inkuru zamamaza";
$categories[8]="Iyobokamana";
$categories[9]="Politiki";
$categories[10]="Ubukungu";
$categories[11]="Uburezi";
$categories[12]="Ubuzima";
$categories[13]="Umuco";
$categories[14]="Umutekano";
$categories[15]="Video y’umunsi";

//CATEGORIES IDS
$categoryIds=array();

$categoryIds[0]="22";
$categoryIds[1]="18";
$categoryIds[2]="31";
$categoryIds[3]="33";
$categoryIds[4]="26";
$categoryIds[5]="6";
$categoryIds[6]="7";
$categoryIds[7]="17";
$categoryIds[8]="30";
$categoryIds[9]="3";
$categoryIds[10]="9";
$categoryIds[11]="28";
$categoryIds[12]="5";
$categoryIds[13]="8";
$categoryIds[14]="27";
$categoryIds[15]="23";


$imagesCategory=array();
$imagesCategory[0]="images/today.jpg";
$imagesCategory[1]="images/international.jpg";
$imagesCategory[2]="images/history.jpg";
$imagesCategory[3]="images/tech.jpg";
$imagesCategory[4]="images/abaturage.jpg";
$imagesCategory[5]="images/sport.jpg";
$imagesCategory[6]="images/entertainment.jpg";
$imagesCategory[7]="images/advert.jpg";
$imagesCategory[8]="images/religion.jpg";
$imagesCategory[9]="images/kagame.jpg";
$imagesCategory[10]="images/economy.jpg";
$imagesCategory[11]="images/education.jpg";
$imagesCategory[12]="images/health.jpg";
$imagesCategory[13]="images/culture.jpg";
$imagesCategory[14]="images/police.jpg";
$imagesCategory[15]="images/video.jpg";

for($i=0;$i<count($categories);$i++){
$category[]=array("category"=>$categories[$i],"image"=>$imagesCategory[$i],"news_id"=>$categoryIds[$i]);	
}
$info = array("data" => $category); 
header('Content-Type: application/json');
echo json_encode($info);
?>