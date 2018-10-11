<?php

$search=$_POST['name'];
include("mysqlconfig.php");
$sql1=mysql_query("select * from produit where (name like'%$search%')");
$info1=mysql_fetch_array($sql1);
?>
<?php do { ?>
<?php echo $info1['name']; ?>
<?php } while ($info1 = mysql_fetch_assoc($sql1)); ?>

<!DOCTYPE html>
<html>

<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
<link href="../css/search.css"/ rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="body">
	<?php include 'header.php'?>
	<div id="content">
		<form action="search.php" method="post">
 			<div class='form'>
   				<input type="text" name="uname" placeholder="Search here...">
     			<button>SEARCH</button>     
 			</div>
		</form>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
		<div class="product">
		<img src="../image/Dujardin - Jeux de société.jpg">
		</div>
	</div>

	<?php include 'footer.php'?>
</body>
</html>