<?php
	
	//delete
	if(isset($_GET["delete"])){
		
		$order_id = $_GET["delete"];
		
		$sql_delete = "delete from orders where order_id = '$order_id'";
		$result_delete = $con -> query($sql_delete);
		
		$sql_delete = "delete from order_addresses where order_id = '$order_id'";
		$result_delete = $con -> query($sql_delete);
		
		header('location:'.htmlentities($_SERVER['PHP_SELF']).'?page=order');
	}
	
	//pay
	if(isset($_GET["pay"])){
		
		$address_id = $_POST["address"];
		$money = $_SESSION["money"];
		$order_id = $_GET["pay"];
		
		$sql = "select amount from orders where order_id = '$order_id'";
		$result = $con -> query($sql);
		$row = $result -> fetch_array();
		
		$amount = $row["amount"];
		
		$rest = $money - $amount;
		
		if($rest >= 0){
			
			$sql_copy = "insert into order_addresses(name, address1, address2, code, city, country, order_id) select name, address1, address2, code, city, country, order_id from addresses, orders where addresses.address_id = '$address_id' and orders.order_id = '$order_id'";
			$result_copy = $con -> query($sql_copy);
			
			$sql_id = "select address_id from order_addresses where order_id = '$order_id'";
			$result_id = $con -> query($sql_id);
			$row_id = $result_id -> fetch_array();
			
			$address_id = $row_id["address_id"];
		
			$sql_pay = "update orders set status = 'payed', address_id = '$address_id' where order_id = '$order_id'";
			$result_pay = $con -> query($sql_pay);
			
			$sql_rest = "update user set money = '$rest' where user_id = '$user_id'";
			$result_rest = $con -> query($sql_rest);
			
			$_SESSION["money"] = $rest;
		
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=order';</script>";
			//header('location:'.htmlentities($_SERVER['PHP_SELF']).'?page=order');
		}
		else{
		
			echo "<script>alert('No enough money!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=order';</script>";	
		}
	}
?>