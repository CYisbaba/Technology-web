<?php
if(isset($_SESSION["username"])){
	
	if(isset($_GET['change']) && $_GET['change'] == "add"){
	
		$user_id = $_SESSION["user_id"];
		$money = $_POST["money"];
	
		$sql_modify = "update user set money = money + '$money' where user_id = '$user_id'";
		$result_modify = $con -> query($sql_modify);
		
		if($result_modify){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=money';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?action=money';</script>";	
		}
	}
?>

<div id="content">

<P>MONEY:</P>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=money&change=add" method="post">

Add money :<input type="number" name="money" id="money" placeholder="Money" min="0" max="9999" required oninvalid="setCustomValidity('Please input your money.');" oninput="setCustomValidity('');">
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