<div id="content">

<p>Add address : </p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=changeinfo&action=change_info&change=address" method="post">
Name :<input type="text" name="name" placeholder="Name" id="name" maxlength="50" required oninvalid="setCustomValidity('Please input your name.');" oninput="setCustomValidity('');">
<BR><BR>
Address1 :<input type="text" name="addressone" id="addressone" placeholder="EX : 10 rue de la Liberation" required oninvalid="setCustomValidity('Please input your address.');" oninput="setCustomValidity('');">
<BR><BR>
Address2 :<input type="text" name="addresstwo" id="addresstwo" placeholder="EX : residence, batiment">
<BR><BR>
Code :<input type="number" name="code" placeholder="Code" id="code" min="0" max="99999999" required oninvalid="setCustomValidity('Please input your code.');" oninput="setCustomValidity('');">
<BR><BR>
City :<input type="text" name="city" placeholder="city" id="city" maxlength="50" required oninvalid="setCustomValidity('Please input your city.');" oninput="setCustomValidity('');">
<BR><BR>
Country :<input type="text" name="country" placeholder="country" id="country" maxlength="50" required oninvalid="setCustomValidity('Please input your country.');" oninput="setCustomValidity('');">
<BR><BR>
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>


<?php
	$sql_address = "select * from addresses where user_id = $user_id";
	$result_address = $con -> query($sql_address);
	
	echo "<div align='center'><table bgcolor=white border='1' width=100%>
	<tr>
	<th>NAME</th>		
	<th>ADDRESS1</th>
	<th>ADDRESS2</th>
	<th>CODE</th>
	<th>CITY</th>
	<th>COUNTRY</th>
	</tr>";
	
	while($row_address = $result_address -> fetch_array()){
		echo "
		<tr>
		<td>".$row_address['name']."</td>
		<td>".$row_address['address1']."</td>
		<td>".$row_address['address2']."</td>
		<td>".$row_address['code']."</td>
		<td>".$row_address['city']."</td>
		<td>".$row_address['country']."</td>
		<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?page=changeadd&action=change_info&change=delete&id=".$row_address['address_id']."'>DELETE</a></td>
		</tr>";
	}
	
	echo "</table></div>";
?>

</div>