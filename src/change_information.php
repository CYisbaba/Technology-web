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
		
		$sql_update = "update user set email = $email where user_id = '$user_id'";
		$result_update = $con -> query($sql_update);
	}
	
	//change password
	elseif($_GET["change"] == "pwd"){
		
		$pwd = md5($_POST["pwd"]);  
        $repwd = md5($_POST["repwd"]); 
		
		if($pwd == $repwd){
			
			$sql_update = "update user set pwd = $pwd where user_id = '$user_id'";
			$result_update = $con -> query($sql_update);	
		}
		else{
			
			echo "<script>alert('Password not the same!'); history.go(-1);</script>";	
		}
	}
}
?>

<div id="content">

<P>Change email:</P>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=changeinfo&change=email" method="post">
Email :<input type="email" name="email" id="email" placeholder="Email" required oninvalid="setCustomValidity('Please input your email.');" oninput="setCustomValidity('');" value="<?php echo $row_m["email"]; ?>">
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>
<BR><BR>

<p>Change password:</p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=changeinfo&change=pwd" method="post">
Password :<input type="password" name="pwd" placeholder="Password" id="password" maxlength="10" required oninvalid="setCustomValidity('Please input the password.');" oninput="setCustomValidity('');">
<BR><BR>
Confirmer password :<input type="password" name="repwd" placeholder="Repassword" id="repassword" maxlength="10" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>

</div>

<?php
}
else{
	
	header("location:index.php");
}
?>