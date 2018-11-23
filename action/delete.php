<?php
//session_start();
if(isset($_GET["id"])){

	$id = $_GET["id"];
	$arr = $_SESSION["cart"];
	$produit_id = $arr[$id][0];
	$order_id = $_SESSION["order_id"];

	$sql_update = "update produit set number = number + 1 where produit_id = '$produit_id'";
	$result_update = $con -> query($sql_update);

	$sql_up = "update links set number = number - 1 where produit_id = '$produit_id' and order_id = '$order_id'";
	$result_up = $con -> query($sql_up);

	if($arr[$id][1] > 1){
		
		$arr[$id][1] = $arr[$id][1]-1;
	}
	else{
		
		unset($arr[$id]);
		
		$arr = array_values($arr);
		$sql_delete = "delete from links where produit_id = '$produit_id' and order_id = '$order_id'";
		$result_delete = $con -> query($sql_delete);
	}
	
	$_SESSION["cart"] = $arr;
	
	header('location:'.htmlentities($_SERVER['PHP_SELF']).'?page=cart');
}
?>