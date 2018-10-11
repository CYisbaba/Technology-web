<?php
$search = $_POST["uname"];
include("mysqlconfig.php");
if (empty($search)){
}else{
	$sql = "select * from produit where (name like'%$search%')";
	$result = $con ->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
	<?php if ($result -> num_rows > 0){
		while($row = $result -> fetch_assoc()){	
			$name =  $row['name'];
			 $price = $row['price'];
			$img = $row['img_url'];
			echo "$name";  
    		echo "$price"; 
    	
		?>
		< img src="<?php echo "$img"; ?>" alt="">
		<?php
		}
	}
		?>	    
</body>
</html>