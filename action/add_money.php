<?php

$money = $_POST["money"];	
$sql_modify = "update user set money = money + '$money' where user_id = '$user_id'";
$result_modify = $con -> query($sql_modify);
		
if($result_modify){
				
	echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=money';</script>";
}
else{
			
	echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=money';</script>";	
}
?>