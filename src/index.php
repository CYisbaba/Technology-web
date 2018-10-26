<html>
<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />

<?php 
include("mysqlconfig.php");

session_start();
?>

</head>

<body class="body">

<?php include 'header.php'?>

<?php

if(isset($_GET["action"])){
	
	$action = $_GET["action"];
	
switch($action){
	
case "product":
include 'produit.php';
break;

case "cart":
include 'cart.php';
break;

case "inscrire":
include 'inscrire.php';
break;

case "search":
include 'search_result.php';
break;

case "changeinfo":
include 'change_information.php';
break;
	}
}
else{ 
?>

<div id="content">
<p>Welcome!</p>
<p>You can add products by username "admin" and password "admin".
</div>

<?php 
} 
?>

</body>

<?php include 'footer.php'?>

</html>