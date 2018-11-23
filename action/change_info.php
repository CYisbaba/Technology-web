<?php
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
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeinfo';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeinfo';</script>";	
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
				
				echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeinfo';</script>";
			}
			else{
			
				echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeinfo';</script>";	
			}
		}
		else{
			
			echo "<script>alert('Password not the same!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeinfo';</script>";	
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
			
		$sql_insert = "insert into addresses(name,address1,address2,code,city,country,user_id) values('$name','$address1','$address2','$code','$city','$country','$user_id')";
		$result_insert = $con -> query($sql_insert);
		
		if($result_insert){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeadd';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeadd';</script>";	
		}	
	}
	
	//delete address
	elseif($_GET["change"] == "delete"){
	
		$id = $_GET["id"];
		
		$sql_delete = "delete from addresses where address_id = '$id'";
		$result_delete = $con -> query($sql_delete);
		
		if($result_delete){
				
			echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeadd';</script>";
		}
		else{
			
			echo "<script>alert('System is busy!'); location = '".htmlentities($_SERVER['PHP_SELF'])."?page=changeadd';</script>";	
		}
	}
}
?>