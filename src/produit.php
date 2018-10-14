<?php include("addincart.php");?>

<div id="content">
<?php 
include("mysqlconfig.php");

$sql = "select * from produit";

if(!empty($_GET["order"]) && !empty($_GET["ids"])){
	$order = $_GET["order"];
	$ids = $_GET["ids"];
	
	switch($ids){
	case "name":
	$sql = "select * from produit order by $ids $order";
	break;
	case "number":
	$sql = "select * from produit order by $ids $order";
	break;
	case "price":
	$sql = "select * from produit order by $ids $order";
	break;
	}
}
$result = $con -> query($sql);

echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name <a href='index.php?action=product&ids=name&order=asc'>↓</a>
<a href='index.php?action=product&ids=name&order=desc'>↑</a></th>
<th>Number<a href='index.php?action=product&ids=number&order=asc'>↓</a>
<a href='index.php?action=product&ids=number&order=desc'>↑</a></th>
<th>Price<a href='index.php?action=product&ids=price&order=asc'>↓</a>
<a href='index.php?action=product&ids=price&order=desc'>↑</a></th>
<th>Descriptiom</th>
</tr>";

while($row = $result -> fetch_array()){
echo "<tr>";
echo "<td><img height=100px width=100px src='".$row['img_url']."'/></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['number']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['description']."</td>";

if(!empty($_SESSION["username"])){
echo "<td><a text-decoration:none href='index.php?action=product&id=".$row['produit_id']."'>Add in cart</a></td>";}
//echo "<td><a text-decoration:none href='addincart.php?id=".$row['produit_id']."'>Add in cart</a></td>";}
echo "</tr>";
}
echo "</table></div>";
?>

</div>