<?php include("addincart.php");?>

<div id="content">

<?php 
$sql = "select * from produit";

$ids = "";
$order = "";

$current_page = 1;
$prepage = 0;
$page_size = 5;
$nextpage = 2;
$pages = 2;

if(isset($_GET["page"])){
	
	$current_page = $_GET["page"];
	
	$sql_count = "select count(*) as 'count' from produit";	
	$result_count = $con -> query($sql_count);
	$arr = $result_count -> fetch_array();
	$count = $arr["count"];
	$pages = ceil($count / $page_size);
	
	if($prepage <= 0){
		
		$prepage = 1;
		$nextpage = $current_page + 1;
	}
	
	if($nextpage >= $pages){
		
		$nextpage = $pages;
	}
}
$start = ($current_page - 1) * $page_size;
$sql = "select * from produit limit $start,$page_size";

//order
if(isset($_GET["order"]) && isset($_GET["ids"])){
	
	$order = $_GET["order"];
	$ids = $_GET["ids"];
	
	switch($ids){
		
	case "name":
	$sql = "select * from produit order by $ids $order limit $start,$page_size";
	break;
	case "number":
	$sql = "select * from produit order by $ids $order limit $start,$page_size";
	break;
	case "price":
	$sql = "select * from produit order by $ids $order limit $start,$page_size";
	break;
	}
}

$result = $con -> query($sql);

echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=name&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=name&order=desc'>↑</a></th>
<th>Number<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=number&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=number&order=desc'>↑</a></th>
<th>Price<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=price&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&ids=price&order=desc'>↑</a></th>
<th>Descriptiom</th>
</tr>";

while($row = $result -> fetch_array()){
	
echo "<tr>";
echo "<td><img height=100px width=100px src='".$row['img_url']."'/></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['number']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['description']."</td>";

//show add in cart after login
if(!empty($_SESSION["username"])){
	
echo "<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?action=product&id=".$row['produit_id']."'>Add in cart</a></td>";}
echo "</tr>";
}

echo "</table>";

if($current_page > 1){

echo "<a href='".$_SERVER['PHP_SELF']."?action=product&page=".$prepage."&ids=".$ids."&order=".$order."'><-previous page</a>";
}
echo " | ";

if($current_page < $pages){
echo "<a href='".$_SERVER['PHP_SELF']."?action=product&page=".$nextpage."&ids=".$ids."&order=".$order."'>next page-></a>";
}
echo "</div>";
?>

</div>