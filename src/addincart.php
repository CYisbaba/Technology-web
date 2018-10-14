<?php
//session_start();
if(!empty($_GET["id"])){
$id = $_GET["id"];

include("mysqlconfig.php");

//$sql = "select * from produit where produit_id = '$id'";
//$result = $con -> query($sql);
//$row = $result -> fetch_array();
//$number = $row["number"] - 1;
//$sql_insert = "insert into produit(number) values('$number') where produit_id = '$id'";
//$result_insert = $con -> query($sql_insert);

if(empty($_SESSION["cart"])){
	//create new cart
	$arr = array(array($id,1));
	$_SESSION["cart"] = $arr;
	header('location:index.php?action=product');
}
else{
	$arr = $_SESSION["cart"];
	
	if(exit_id($id,$arr)){

		//if there is the product, add number
		foreach($arr as $k=>$v){
		
			if($v[0] == $id){
				$arr[$k][1]++;    
   			}
		} 
  		$_SESSION["cart"] = $arr;
		header('location:index.php?action=product');

	}
	else{

		//if there isn't, create a new one
		$arr = $_SESSION["cart"]; 
		$attr = array($id,1);
		$arr[] = $attr;
		$_SESSION["cart"] = $arr;
		header('location:index.php?action=product');
	}
}
}
//header('location:produit.php');
//$arr = $_SESSION["cart"];
//foreach($arr as $k=>$v){
//	$id = $v[0];
//	$number = $v[1];
//	$user_id = $_SESSION["user_id"];
//	$sql_insert = "insert into cart(produit_id,number,user_id) values('$id','$number','user_id')";
//	$result_insert = mysql_query($sql_insert);
//}

//header("location:index.php?action=product");

 
//judge whether the product in cart or not
function exit_id($value, $array) { 

	foreach($array as $item) { 

		if(!is_array($item)) { 

			if ($item == $value) { 
    			return true; 
   			}
			else{ 
    			continue; 
			} 
		} 

		if(in_array($value, $item)) { 
			return true;  
		}
		else if(exit_id($value, $item)){ 
			return true;  
		} 
	} 
	return false; 
}

?>