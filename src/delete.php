<?php
//session_start();
if(!empty($_GET["id"])){

$id = $_GET["id"] - 1;
$arr = $_SESSION["cart"];

if($arr[$id][1] > 1){
	$arr[$id][1] = $arr[$id][1]-1;
}
else{
	unset($arr[$id]);
	$arr = array_values($arr);
}
$_SESSION["cart"] = $arr;
header('location:index.php?action=cart');
}
?>