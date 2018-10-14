<?php include("delete.php");?>

<div id="content">
<?php 
include("mysqlconfig.php");

if(!empty($_SESSION["cart"])){
	$arr = $_SESSION["cart"];
		
echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name</th>
<th>Price</th>
<th>Number</th>
</tr>";

		foreach($arr as $k=>$v){
		$sql = "select * from produit where produit_id = '{$v[0]}'";
		$result = $con -> query($sql);
		
			while($row = $result -> fetch_array()){
				$k = $k + 1;
				echo "<tr>";
				echo "<td><img height=100px width=100px src='".$row["img_url"]."'/></td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["price"]*$v[1]."</td>";
				echo "<td>".$v[1]."</td>";
				echo "<td><a text-decoration:none href='index.php?action=cart&id=".$k."'>DELETE</a></td>";
				echo "</tr>";
			}
		}
echo "</table></div>";
}
else{
echo "No products";
}
?>
</div>