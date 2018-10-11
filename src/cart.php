<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
</head>
<body class="body">
<?php include 'header.php'?>
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
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
echo "<tr>";
echo "<td><img height=100px width=100px src='".$row[5]."'/></td>";
echo "<td>".$row[1]."</td>";
echo "<td>".$row[3]*$v[1]."</td>";
echo "<td>".$v[1]."</td>";
echo "<td><a text-decoration:none href='delete.php?ids=".$k."'>DELETE</a></td>";
echo "</tr>";
		}
}
echo "</table></div>";
}
else{
echo "No products";
}
//mysql_close($con);
?>
</div>
<?php include 'footer.php'?>
</body>