<?php
session_start();
$id = $_GET["id"];


//include("mysqlconfig.php");
//$sql = "select * from cart where produit_id = '$id'";
//$result = mysql_query($sql);
//while($row = mysql_fetch_array($result)){
//$arr = array(array($row["produit_id"],$row["number"]));	
//$_SESSION["cart"] = $arr;
//}

if(empty($_SESSION["cart"])){
	//create new cart
	$arr = array(array($id,1));
	$_SESSION["cart"] = $arr;
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

	}
	else{

		//if there isn't, create a new one
		$arr = $_SESSION["cart"]; 
		$attr = array($id,1);
		$arr[] = $attr;
		$_SESSION["cart"] = $arr;
	}
}

//$arr = $_SESSION["cart"];
//foreach($arr as $k=>$v){
//	$id = $v[0];
//	$number = $v[1];
//	$user_id = $_SESSION["user_id"];
//	$sql_insert = "insert into cart(produit_id,number,user_id) values('$id','$number','user_id')";
//	$result_insert = mysql_query($sql_insert);
//}

header("location:produire.php");

 

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