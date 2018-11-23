<?php 	
//session_start();

if((isset($_GET['action'])) && ($_GET['action'] == "logout")){
	
	unset($_SESSION["username"]);
	unset($_SESSION["user_id"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["cart"]);
	unset($_SESSION["order_id"]);
	unset($_SESSION["money"]);
	unset($_SESSION["amount"]);
	
	setcookie("user", "", time()-3600*24);
	
	echo "<script>alert('Logout'); location = '".htmlentities($_SERVER['PHP_SELF'])."';</script>";
	//header('location:index.php');
} 	
?>