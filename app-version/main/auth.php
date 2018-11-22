<?php 
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['admin'])){
	header("Location:access");
}
?>