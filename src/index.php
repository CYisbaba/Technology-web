<?php 

session_start();

$page = "main";
$action = "";

//page select
if(isset($_GET["page"])){
	
	$page = $_GET["page"];
}

//action select
if(isset($_GET["action"])){
	
	$action = $_GET["action"];
}

include("mysqlconfig.php");
include("cookiecheck.php");
include('check_user.php');

if (file_exists('../action/'.$action.'.php')){
	
	include ('../action/'.$action.'.php');
}
//else{
	
//	include ('error.php');
//}

?>

<html>
<head>

<link href="../css/main.css" rel="stylesheet" type="text/css" />

</head>

<body class="body">

<?php include 'header.php'?>

<?php
	
switch($page){
	
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

case "changeadd":
include 'change_address.php';
break;

case "order":
include 'order.php';
break;

case "money":
include 'money.php';
break;

case "main";
echo "<div id='content'>
<p>Welcome!</p>
<p>You can add products by username 'admin' and password 'admin'.
</div>";
break;
}
?>

</body>

<?php include 'footer.php'?>

</html>