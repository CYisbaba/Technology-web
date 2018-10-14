<?php 	
//session_start();

if((!empty($_GET['action'])) && ($_GET['action'] == "logout")){
	
	unset($_SESSION["username"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["cart"]);
	echo "<script>alert('Logout'); location = 'index.php';</script>";
	//header('location:index.php');
} 	
?>