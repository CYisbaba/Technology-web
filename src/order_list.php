<?php
if((!empty($_SESSION["admin"])) && ($_SESSION["admin"] == "admin")){
	
	//the detail of the order
	if(isset($_GET["detail"])){
		
		$order_id = $_GET["detail"];
		
		$sql = "select img_url,name,price,links.number,links.produit_id from links,produit where links.order_id = '$order_id' and links.produit_id = produit.produit_id";
		$result = $con -> query($sql);
		
		echo "<a href='admin.php?page=order_list'>BACK</a>";
		
		$sql_id = "select address_id,updated from orders where order_id = '$order_id'";
		$result_id = $con -> query($sql_id);
		$row_id = $result_id -> fetch_array();
		
		$address_id = $row_id["address_id"];
		
		echo "<table border='1'>
		<caption>".$row_id["updated"]."</caption>
		<tr>
		<th></th>
		<th>Name</th>
		<th>Number</th>
		</tr>";
		
		while($row = $result -> fetch_array()){
			
			echo "<tr>";
			echo "<td><img height=100px width=100px src='".$row["img_url"]."'/></td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["number"]."</td>";
			echo "<td>".$row["price"]."</td>";
			echo "</tr>";
			
		}
		
		$sql_address = "select * from order_addresses where address_id = '$address_id'";
		$result_address = $con -> query($sql_address);
		$row_address = $result_address -> fetch_array();
		
		echo "<tr><td colspan='4'><a>".$row_address["name"].", ".$row_address["address1"].", ".$row_address["address2"].", ".$row_address["code"].", ".$row_address["city"].", ".$row_address["country"]."</a></td></tr>";
	}
	
	//order list
	else{	
		$sql = "select * from orders, user, order_addresses where type = 'order' and orders.user_id = user.user_id and orders.address_id = order_addresses.address_id"; 
		$result = $con -> query($sql);

		echo "<a href='admin.php'>BACK</a>";

		echo "<table border='1'>
		<tr>
		<th>Date</th>
		<th>Username</th>
		<th>Status</th>
		<th>Amount</th>
		<th>Address</th>
		<th></th>
		</tr>";

		while($row = $result -> fetch_array()){
	
				echo "
				<tr>
				<td>".$row["updated"]."</td>
				<td>".$row["username"]."</td>
				<td>".$row["status"]."s</td>
				<td>".$row["amount"]."</td>
				<td>".$row["name"].", ".$row["address1"].", ".$row["address2"].", ".$row["code"].", ".$row["country"]."</td>
				<td><a href='admin.php?page=order_list&detail=".$row["order_id"]."'>details</a></td>
				</tr>";
		}
	}
}
else{
	
	echo "you have no access";
	
	header('Refresh: 1; url=index.php');
}
?>