<?php
//session_start();
if(isset($_GET["id"])){
	
	$id = $_GET["id"];
	$range = $_GET["range"];
	$user_id = $_SESSION["user_id"];
	$order_id = $_SESSION["order_id"];

	$sql_update = "update produit set number = number - 1 where produit_id = '$id'";
	$result_update = $con -> query($sql_update);

	if(empty($_SESSION["cart"])){
		
		//create new cart
		$arr = array(array($id,1));
		$_SESSION["cart"] = $arr;
		
		$sql_link = "insert into links(order_id,produit_id,number) values('$order_id','$id','1')";
		$result_link = $con -> query($sql_link);
	
		header('location:'.htmlentities($_SERVER['PHP_SELF']).'?action=product&range='.$range);
	}
	else{
		$arr = $_SESSION["cart"];
		
		if(exit_id($id,$arr)){

			//if there exits the product, add number
			foreach($arr as $k=>$v){
		
				if($v[0] == $id){
					
					$arr[$k][1]++;    
   				}
			} 
  			$_SESSION["cart"] = $arr;
		
			$sql_number = "update links set number = number + 1 where produit_id = '$id' and order_id = '$order_id'";
			$result_number = $con -> query($sql_number);
		
			header('location:'.htmlentities($_SERVER['PHP_SELF']).'?action=product&range='.$range);

		}
		else{

			//if there isn't, create a new one
			$arr = $_SESSION["cart"]; 
			$attr = array($id,1);
			$arr[] = $attr;
			$_SESSION["cart"] = $arr;
			
			$sql_insertnew = "insert into links(order_id,produit_id,number) values('$order_id','$id','1')";
			$result_insertnew = $con -> query($sql_insertnew);  
		
			header('location:'.htmlentities($_SERVER['PHP_SELF']).'?action=product&range='.$range);
		}
	}
}

 
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