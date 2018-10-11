<?php
session_start();
$id = $_GET["ids"];
$arr = $_SESSION["cart"];

if($arr[$id][1] > 1){
	$arr[$id][1] = $arr[$id][1]-1;
}
else{
	unset($arr[$id]);
	$arr = array_values($arr);
}
$_SESSION["cart"] = $arr;
header("location:cart.php");
?>