<div id="content">
<?php
if(isset($_SESSION["username"])){
	
	$user_id = $_SESSION["user_id"];
	
	//delete
	if(isset($_GET["delete"])){
		
		$order_id = $_GET["delete"];
		
		$sql_delete = "delete from orders where order_id = '$order_id'";
		$result_delete = $con -> query($sql_delete);
		
		header('location:'.htmlentities($_SERVER['PHP_SELF']).'?action=order');
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
		
			$sql_pay = "update orders set status = 'payed', address_id = '$address_id' where order_id = '$order_id'";
			$result_pay = $con -> query($sql_pay);
			
			$user_id = $_SESSION["user_id"];
			
			$sql_rest = "update user set money = '$rest' where user_id = '$user_id'";
			$result_rest = $con -> query($sql_rest);
			
			$_SESSION["money"] = $rest;
		
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=order';</script>";
			//header('location:'.htmlentities($_SERVER['PHP_SELF']).'?action=order');
		}
		else{
		
			echo "<script>alert('No enough money!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=order';</script>";	
		}
	}
	
	$sql_order = "select * from orders where user_id = '$user_id' and type = 'order'";
	$result_order = $con -> query($sql_order);
	$num_order = $result_order -> num_rows;
	
	if($num_order){
		
		while($row_order = $result_order -> fetch_array()){
		
			$order_id = $row_order["order_id"];
			$address_id = $row_order["address_id"];
			
			echo "<div align='center'><table bgcolor=white border='1' width=100%>
			<tr>".$row_order["updated"]."</tr>
			<tr>
			<th></th>
			<th>Name</th>
			<th>Number</th>
			<th>Price</th>
			<th></th>
			</tr>";

			$sql_unpay = "select img_url,name,price,links.number,links.produit_id from links,produit where links.order_id = '$order_id' and links.produit_id = produit.produit_id";
			$result_unpay = $con -> query($sql_unpay);
			
		while($row_unpay = $result_unpay -> fetch_array()){
			
			echo "<tr>";
			echo "<td><img height=100px width=100px src='".$row_unpay["img_url"]."'/></td>";
			echo "<td>".$row_unpay["name"]."</td>";
			echo "<td>".$row_unpay["number"]."</td>";
			echo "<td>".$row_unpay["price"]."</td>";
			echo "<td></td>";
			echo "</tr>";
			
		}
		
		echo "<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total price:".$row_order["amount"]."</td>
		<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?action=order&delete=".$order_id."' onClick='return confirm(`Are you sure?`);'>DELETE</a></td>
		</tr>";
		
		//payed
		if($row_order["status"] == "payed"){
			
			echo "<tr>";
			
			$sql_address = "select * from addresses where address_id = '$address_id'";
			$result_address = $con -> query($sql_address);
			$row_address = $result_address -> fetch_array();
			
			echo "<td><a>".$row_address["name"].", ".$row_address["address1"].", ".$row_address["address2"].", ".$row_address["code"].", ".$row_address["city"].", ".$row_address["country"]."</a></td>
			</tr>";
			echo "<tr>
			<td><a>PAYED</a></td>
			</tr>";
		}
		else{
			
			$sql_address = "select * from addresses where user_id = '$user_id'";
			$result_address = $con -> query($sql_address);
			$num_address = $result_address -> num_rows;
			
			//address
			if($num_address){
			
				echo "
				<tr>
				<form action='".htmlentities($_SERVER['PHP_SELF'])."?action=order&pay=".$order_id."' method='post'>
				<td><select name='address' id='address'>";
			
				while($row_address = $result_address -> fetch_array()){
				
					$address_id = $row_address["address_id"];
			
					echo "<option value ='$address_id'>"."<a>".$row_address["name"].", ".$row_address["address1"].", ".$row_address["address2"].", ".$row_address["code"].", ".$row_address["city"].", ".$row_address["country"]."</a>"."</option>";	
				}
			
				echo "</select></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
				<button type='submit' id='sumbit' name='submit' onClick='return confirm(`Are you sure?`);'>PAY</button>
				</td>
				</tr>";
			}
			else{
			
				echo "<tr><td><a>You have no address</a></td></tr>";	
			}
		}
		
	echo "</table></div><br><br>";
	}
	}
	else{
		
		echo "No orders";
	}
}
else{
	
	header("location:index.php");
}
?>
</div>