<?php 	
session_start();
if($_GET['action'] == "logout"){
	unset($_SESSION["username"]);
	unset($_SESSION["admin"]);
	echo "Logout";
	header('Refresh: 1; url=index.php');
} 	
?>