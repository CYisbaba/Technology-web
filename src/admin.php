<?php

session_start();

include("mysqlconfig.php");

//page select
if(isset($_GET["page"])){
	
	$page = $_GET["page"];
}

//action select
if(isset($_GET["action"])){
	
	$action = $_GET["action"];
}

//judge authority
if((!empty($_SESSION["admin"])) && ($_SESSION["admin"] == "admin")){
	
	include("upload.php");
	
	$ids = "";
	$order = "";
	
//delete product	
if((isset($_GET['action'])) && ($_GET["action"] == "delete")){
	
	$id = $_GET["id"];
	$sql = "select * from produit where produit_id = '$id'";
	$result = $con -> query($sql);
	$row = $result -> fetch_array();
	$img = $row['img_url'];
	
	unlink($img);
	
	$sql_delete = "delete from produit where produit_id = '$id'";
	$result_delete = $con -> query($sql_delete);
	
	header('location:admin.php');
}

//modify product
elseif((isset($_GET['action'])) && ($_GET["action"] == "modify")){
	
	$id = $_GET["id"];
	$sql_modify = "select * from produit where produit_id = '$id'";
	$result_modify = $con -> query($sql_modify);
	$row_m = $result_modify -> fetch_array();
?>

<div>

<form action="admin.php?id=<?php echo "$id"; ?>" method="post" enctype="multipart/form-data">
name : <input type="text" name="name" placeholder="Product name" id="name" maxlength="20" value="<?php echo $row_m["name"]; ?>" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
number : <input type="number" name="number" placeholder="Number" id="number" min="0" max="999" value="<?php echo $row_m["number"]; ?>" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
price : <input type="text" name="price" placeholder="Number" id="number" value="<?php echo $row_m["price"]; ?>" pattern="^[0-9]+(.[0-9]{2})?$" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
image : <input name="img" type="file" id="img" accept="image/*" value="<?php echo $row_m["img_url"]; ?>" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
description :

<div>
<textarea name="description" id="description" maxlength="100" rows=10 cols=40 value="" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">

<?php echo $row_m["description"]; ?>

</TEXTAREA>

</div>

<BR><BR>
<button type="submit">Mofify</button>
<button type="reset">Reset</button>

<a href="admin.php" style="color:black">BACK</a>

</form>

</div>

<?php 
}
else{	
	
	//oder list
	if(isset($_GET["page"]) && $_GET["page"] == "order_list"){
	
		include("order_list.php");
	}
	else{
	?>

<div>
<p><a href="admin.php?page=order_list">Order list</a></p>
<form action="admin.php" method="post" enctype="multipart/form-data">
name : <input type="text" name="name" placeholder="Product name" id="name" maxlength="20" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
number : <input type="number" name="number" placeholder="Number" id="number" min="0" max="999" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
price : <input type="text" name="price" placeholder="X.XX" id="number" pattern="^[0-9]+(.[0-9]{2})?$" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
range : <select name="range" id="range">
<?php 			

	$sql_range = "select * from ranges";
	$result_range = $con -> query($sql_range);

	while($row_range = $result_range -> fetch_array()){
	
		echo "<option value =".$row_range['range_id'].">".$row_range['name']."</option>";				
}
?>
</select>
<BR><BR>
image : <input name="img" type="file" id="img" accept="image/*" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
description :

<div>
<textarea name="description" id="description" maxlength="100" rows=10 cols=40 required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
</TEXTAREA>
</div>

<BR><BR>
<button type="submit">Confirmer</button>
<button type="reset">Reset</button>
<a href="admin.php?action=logout" style="color:red">LOGOUT</a>
</form>

</div>

<div>

<?php 

//show all the products
echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=name&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=name&order=desc'>↑</a></th>
<th>Number<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=number&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=number&order=desc'>↑</a></th>
<th>Price<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=price&order=asc'>↓</a>
<a href='".htmlentities($_SERVER['PHP_SELF'])."?ids=price&order=desc'>↑</a></th>
<th>Descriptiom</th>
</tr>";

$sql = "select * from produit";

//order
if(isset($_GET["order"]) && isset($_GET["ids"])){
	
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

while($row = $result -> fetch_array()){
	
	echo "<tr>";
	echo "<td><img height=100px width=100px src='".$row['img_url']."'/></td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['number']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td><a text-decoration:none href='admin.php?action=delete&id=".$row['produit_id']."' onClick='return confirm(`Are you sure?`);'>DELETE</a></td>";
	echo "<td><a text-decoration:none href='admin.php?action=modify&id=".$row['produit_id']."'>MODIFY</a></td>";
	echo "</tr>";
}

echo "</table></div>";

}
}
}
else{
	
	echo "you have no access";
	
	header('Refresh: 1; url=index.php');
}
?>

</div>

<?php
include("logout.php");	
?>