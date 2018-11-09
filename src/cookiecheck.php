<?php

if(isset($_COOKIE["user"])){
	
	$secureKey = 'linglinglingling';
	$str = $_COOKIE["user"];
	
	$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secureKey, base64_decode($str), MCRYPT_MODE_ECB);
	$userinfo = unserialize($str);
	
	$username = $userinfo["username"];
	$pwd = $userinfo["pwd"];
			
    $sql = "select user_id,username,pwd,money from user where username = '$username' and pwd = '$pwd'";  
    $result = $con -> query($sql);  
    $num = $result -> num_rows;
	$row = $result -> fetch_array();
	$user_id = $row["user_id"];
	$money = $row["money"];
			
	$sql_order = "select * from orders where user_id = '$user_id' and type = 'cart'";
	$result_order = $con -> query($sql_order);
	$row_order = $result_order -> fetch_array();
	
	$order_id = $row_order["order_id"];
			
    if($num){
				
		//input cart
		$sql_cart = "select produit_id,number from links where order_id = '$order_id'";
		$result_cart = $con -> query($sql_cart);
		$num_cart = $result_cart -> num_rows;  
		//$arr = array(array());
				
		if($num_cart){
						
			while($row_cart = $result_cart -> fetch_array()){
							
				$attr = array($row_cart["produit_id"],$row_cart['number']);
				$arr[] = $attr;
			}
						
			$_SESSION["cart"] = $arr;	
		}
				
		$_SESSION["username"] = $username;
		$_SESSION["user_id"] = $user_id;
		$_SESSION["order_id"] = $order_id;
		$_SESSION["money"] = $money;
    }  
}
?>