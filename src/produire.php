<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
</head>
<body class="body">

<?php include 'header.php'?>

<div id="content">
<?php 
include("mysqlconfig.php");

$sql = "select * from produit";
$result = mysql_query($sql);

echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th></th>
<th>Name</th>
<th>Number</th>
<th>Price</th>
<th>Descriptiom</th>
</tr>";

while($row = mysql_fetch_array($result)){
echo "<tr>";
echo "<td><img height=100px width=100px src='".$row['img_url']."'/></td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['number']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['description']."</td>";

if(!empty($_SESSION["username"])){
echo "<td><a text-decoration:none href='addincart.php?id=".$row['produit_id']."'>Add in cart</a></td>";}
echo "</tr>";
}
echo "</table></div>";

//mysql_close($con);
?>
</div>

<?php include 'footer.php'?>

</body>