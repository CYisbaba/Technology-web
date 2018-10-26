<?php

if(isset($_SESSION["username"])){
	
$search = $_POST["uname"];

include("mysqlconfig.php");

if (empty($search)){
	
	header("location:".htmlentities($_SERVER['PHP_SELF'])."?action=search");
}
else{
	
	$sql = "select * from produit where (name like'%$search%')";
	$result = $con -> query($sql);
}
?>

<div id="content">

	<?php 
	
	if ($result -> num_rows > 0){
		
		while($row = $result -> fetch_assoc()){
			$produit_id = $row["produit_id"];
			$name =  $row["name"];
			$number = $row["number"];
			$price = $row["price"];
			$img = $row["img_url"];
    		$description = $row["description"];
			
		?>
        
<p><a>Result: <?php echo $search; ?></a></p>

<div align='center'>

<table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name</th>
<th>Number</th>
<th>Price</th>
<th>Descriptiom</th>
</tr> 
<tr>
<td><img height=100px width=100px src="<?php echo "$img"; ?>"/></td>
<td><?php echo "$name"; ?></td>
<td><?php echo "$number"; ?></td>
<td><?php echo "$price"; ?></td>
<td><?php echo "$description"; ?></td>
<td><a text-decoration:none href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=product&id=<?php echo "$produit_id"; ?>">Add in cart</a></td>
</tr>
</table>

</div> 
  
<?php
		}
	}
	else{
		
		echo "Result:".$search;
		echo "<br />";
		echo "No product";
		}
}
else{
	
	header("location:index.php");	
}
?>	

</div>