<?php
if(isset($_SESSION["username"])){

$user_id = $_SESSION["user_id"];
$sql_modify = "select * from user where user_id = '$user_id'";
$result_modify = $con -> query($sql_modify);
$row_m = $result_modify -> fetch_array();

if(isset($_GET['change'])){
	
	//change email
	if($_GET["change"] == "email"){
		
		$email = $_POST["email"];
		
		$sql_update = "update user set email = '$email' where user_id = '$user_id'";
		$result_update = $con -> query($sql_update);
		
		if($result_update){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";	
		}
	}
	
	//change password
	elseif($_GET["change"] == "pwd"){
		
		$pwd = md5($_POST["pwd"]);  
        $repwd = md5($_POST["repwd"]); 
		
		if($pwd == $repwd){
			
			$sql_update = "update user set pwd = '$pwd' where user_id = '$user_id'";
			$result_update = $con -> query($sql_update);
			
			if($result_update){
				
				echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";
			}
			else{
			
				echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";	
			}
		}
		else{
			
			echo "<script>alert('Password not the same!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";	
		}
	}
	
	//add address
	elseif($_GET["change"] == "address"){
		
		$name = $_POST["name"];  
        $address1 = $_POST["addressone"]; 
		$address2 = $_POST["addresstwo"];
		$code = $_POST["code"];
		$city = $_POST["city"];
		$country = $_POST["country"];
		$user_id = $_SESSION["user_id"];
			
		$sql_insert = "insert into addresses(name,address1,address2,code,city,country,user_id) values('$name','$address1','$address2','$code','$city','$country','$user_id')";
		$result_insert = $con -> query($sql_insert);
		
		if($result_insert){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";	
		}	
	}
	
	//delete address
	elseif($_GET["change"] == "delete"){
	
		$id = $_GET["idd"];
		
		$sql_delete = "delete from addresses where address_id = '$id'";
		$result_delete = $con -> query($sql_delete);
		
		if($result_delete){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo';</script>";	
		}
	}
}
?>

<div id="content">

<P>Change email : </P>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=changeinfo&change=email" method="post">
Email :<input type="email" name="email" id="email" placeholder="Email" required oninvalid="setCustomValidity('Please input your email.');" oninput="setCustomValidity('');" value="<?php echo $row_m["email"]; ?>">
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>
<BR><BR>

<p>Change password : </p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=changeinfo&change=pwd" method="post">
Password :<input type="password" name="pwd" placeholder="Password" id="password" maxlength="10" required oninvalid="setCustomValidity('Please input the password.');" oninput="setCustomValidity('');">
<BR><BR>
Confirmer password :<input type="password" name="repwd" placeholder="Repassword" id="repassword" maxlength="10" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>
<BR><BR>

<p>Add address : </p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=changeinfo&change=address" method="post">
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
	
	while($row_address = $result_address -> fetch_array()){
		echo "<div align='center'><table bgcolor=white border='1' width=100%>
<tr>
<th>NAME</th>		
<th>ADDRESS1</th>
<th>ADDRESS2</th>
<th>CODE</th>
<th>CITY</th>
<th>COUNTRY</th>
</tr>
<tr>
<td>".$row_address['name']."</td>
<td>".$row_address['address1']."</td>
<td>".$row_address['address2']."</td>
<td>".$row_address['code']."</td>
<td>".$row_address['city']."</td>
<td>".$row_address['country']."</td>
<td><a text-decoration:none href='".htmlentities($_SERVER['PHP_SELF'])."?action=changeinfo&change=delete&idd=".$row_address['address_id']."'>DELETE</a></td>
</tr>
</table></div>";
		
	}
}
else{
	
	header("location:index.php");
}
?>
</div>