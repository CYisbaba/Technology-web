<?php
if(isset($_GET["submit"])){
	
	$order_id = $_GET["submit"];
	$user_id = $_SESSION["user_id"];
	$amount = $_SESSION["amount"];
	
	$sql = "select * from addresses where user_id = '$user_id'";
	$result = $con -> query($sql);
	$num = $result -> num_rows;
	
	if($num){
	
		//change cart into order
    	$sql_order = "update orders set type = 'order', amount = '$amount' where order_id = '$order_id'";  
    	$result_order = $con -> query($sql_order);
		
		//delete cart
		unset($_SESSION["cart"]);
		
		//$sql_delete = "delete from links where order_id = '$order_id'";
		//$result_delete = $con -> query($sql_delete);
	
		//add new cart
		$sql_cart = "insert into orders(user_id,type,status) values('$user_id','cart','cart')";
		$result_cart = $con -> query($sql_cart);
		
		$sql_cart = "select order_id from orders where user_id = '$user_id' and type = 'cart'";
		$result_cart = $con -> query($sql_cart);
		$row_cart = $result_cart -> fetch_array();
	
		$_SESSION["order_id"] = $row_cart["order_id"];
		
		echo "<script>alert('Success!'); history.go(-1);</script>";
	}
	else{
	
		echo "<script>alert('No address!'); history.go(-1);</script>"; 	
	}
}

?>