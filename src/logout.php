<?php 	
session_start();

if($_GET['action'] == "logout"){
	
	unset($_SESSION["username"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["cart"]);
	echo "Logout";
	header('Refresh: 1; url=index.php');
} 	
?>