<div id="content">

<?php 
if(isset($_SESSION["username"])){
	
	include("delete.php");
	
	$user_id = $_SESSION["user_id"];
	
	if(!isset($_COOKIE[$user_id])){
		
		setcookie($user_id."[user_id]",$user_id, time()+3600*24);
		setcookie($user_id."[order]","", time()+3600*24);
		setcookie($user_id."[ids]","", time()+3600*24);
	}
	
if(!empty($_SESSION["cart"])){
	
	$arr = $_SESSION["cart"];
	$sum = 0;
	
		
	echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=name&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=name&order=desc'>↑</a></th>
<th>Number<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=number&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=number&order=desc'>↑</a></th>
<th>Price<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=price&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&ids=price&order=desc'>↑</a></th>
<th></th>
</tr>";

		//foreach($arr as $k=>$v){
			
			$sql = "select img_url,name,price,cart.number,cart.produit_id from cart,produit where user_id = '$user_id' and cart.produit_id = produit.produit_id";
			
			if(!empty($_COOKIE[$user_id."[order]"])){
				
				$order = $_COOKIE[$user_id."[order]"];
				$ids = $_COOKIE[$user_id."[ids]"];
				
				$sql = "select img_url,name,price,cart.number,cart.produit_id from cart,produit where user_id = '$user_id' and cart.produit_id = produit.produit_id order by $ids $order";
			}
			
			//order
			if(isset($_GET["order"]) && isset($_GET["ids"])){
	
				$order = $_GET["order"];
				$ids = $_GET["ids"];
				
				$_COOKIE[$user_id."[order]"] = $order;
				$_COOKIE[$user_id."[ids]"] = $ids;
	
				switch($ids){
		
				case "name":
				$sql = "select img_url,name,price,cart.number,cart.produit_id from cart,produit where user_id = '$user_id' and cart.produit_id = produit.produit_id order by $ids $order";
				break;
				case "number":
				$sql = "select img_url,name,price,cart.number,cart.produit_id from cart,produit where user_id = '$user_id' and cart.produit_id = produit.produit_id order by $ids $order";
				break;
				case "price":
				$sql = "select img_url,name,price,cart.number,cart.produit_id from cart,produit where user_id = '$user_id' and cart.produit_id = produit.produit_id order by $ids $order";
				break;
				}
			}
			
			$result = $con -> query($sql);
		
				while($row = $result -> fetch_array()){
					
					$cart_id = 0;
					
					foreach($arr as $k=>$v){
						
						if($row["produit_id"] == $v[0]){
						
							$cart_id = $k;
						}
					}
				
					//$k = $k + 1;
					$sum = $sum + $row["price"]*$row["number"];
					
					echo "<tr>";
					echo "<td><img height=100px width=100px src='".$row["img_url"]."'/></td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["number"]."</td>";
					echo "<td>".$row["price"]."</td>";
					echo "<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?action=cart&id=".$cart_id."'>DELETE</a></td>";
					echo "</tr>";
				}
		//}
		echo "<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total price:".$sum."</td>
		<td></td>
		</tr>";
		
	echo "</table></div>";
}
else{
	
echo "No products";
}
}
else{
	
	header("location:index.php");	
}
?>
</div>