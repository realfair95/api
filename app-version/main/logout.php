<?php 
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['admin'])){
	header("Location:access");
}else{
	unset($_SESSION['id']);
	unset($_SESSION['admin']);
	session_destroy();
	header("Location:access");
}
?>