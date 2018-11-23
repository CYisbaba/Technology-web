<div id="content">

<?php 

$ids = "";
$order = "";
$range_id = "1";

$current_page = 1;
$prepage = 0;
$page_size = 5;
$nextpage = 2;
$pages = 2;

$sql = "select * from produit";

//range
if(isset($_GET["range"])){
	
	$range = "range_id = ".$_GET["range"];
	$range_id = $_GET["range"];
}

$sql = "select * from produit where range_id = '$range_id'";

//page
if(isset($_GET["pages"])){
	
	$current_page = $_GET["pages"];
	
	$sql_count = "select count(*) as 'count' from produit where range_id = '$range_id'";	
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
$sql = "select * from produit where range_id = '$range_id' limit $start,$page_size";

//order
if(isset($_GET["order"]) && isset($_GET["ids"])){
	
	$order = $_GET["order"];
	$ids = $_GET["ids"];
	
	switch($ids){
		
	case "name":
	$sql = "select * from produit where range_id = '$range_id' order by $ids $order limit $start,$page_size";
	break;
	case "number":
	$sql = "select * from produit where range_id = '$range_id' order by $ids $order limit $start,$page_size";
	break;
	case "price":
	$sql = "select * from produit where range_id = '$range_id' order by $ids $order limit $start,$page_size";
	break;
	}
}

echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=name&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=name&order=desc'>↑</a></th>
<th>Number<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=number&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=number&order=desc'>↑</a></th>
<th>Price<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=price&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&ids=price&order=desc'>↑</a></th>
<th>Descriptiom</th>
</tr>";

$result = $con -> query($sql);

while($row = $result -> fetch_array()){
	
echo "<tr>";
echo "<td><img height=100px width=100px src='".$row['img_url']."'/></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['number']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['description']."</td>";

//show add in cart after login
if(!empty($_SESSION["user_id"])){
	
echo "<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$range_id."&action=addincart&id=".$row['produit_id']."'>Add in cart</a></td>";}
echo "</tr>";
}

echo "</table>";

if($current_page > 1){

echo "<a href='".$_SERVER['PHP_SELF']."?page=product&range=".$range_id."&pages=".$prepage."&ids=".$ids."&order=".$order."'><-previous page</a>";
}
echo " | ";

if($current_page < $pages){
echo "<a href='".$_SERVER['PHP_SELF']."?page=product&range=".$range_id."&pages=".$nextpage."&ids=".$ids."&order=".$order."'>next page-></a>";
}
echo "</div>";
?>

</div>