<?php  
if((isset($_GET["action"])) && ($_GET["action"] == "login")){
	
if(isset($_POST["submit"])){
	
        $username = htmlspecialchars($_POST["username"]);  
        $pwd = md5($_POST["pwd"]);  /*md5()*/
		
        if($username == "" || $pwd == ""){
			
			echo "<script>alert('Please enter your name and your password!'); history.go(-1);</script>";  
            //echo "Please enter your name and your password!";
			//header('Refresh: 1; url=index.php');
        } 
		
		elseif($username == "admin" || $pwd == "admin"){
			
			$_SESSION["admin"]="admin";
			
			echo "<script>alert('Success!'); location = 'admin.php';</script>"; 
			//echo "Admin!";header('Refresh: 1; url=admin.php');
		} 
        else{
			
            $sql = "select user_id,username,pwd,money from user where username = '$username' and pwd = '$pwd'";  
            $result = $con -> query($sql);  
            $num = $result -> num_rows;
			$row = $result -> fetch_array();
			$user_id = $row["user_id"];
			$money = $row["money"];
			
			$sql_order = "select * from orders where user_id = '$user_id' and type = 'cart'";
			$result_order = $con -> query($sql_order);
			$row_order = $result_order -> fetch_array();
	
			$order_id = $row_order["order_id"];
			
            if($num){
				
				//input cart
				$sql_cart = "select produit_id,number from links where order_id = '$order_id'";
				$result_cart = $con -> query($sql_cart);
				$num_cart = $result_cart -> num_rows;  
				//$arr = array(array());
				
					if($num_cart){
						
						while($row_cart = $result_cart -> fetch_array()){
							
							$attr = array($row_cart["produit_id"],$row_cart['number']);
							$arr[] = $attr;
						}
						
						$_SESSION["cart"] = $arr;	
					}
				
				$_SESSION["username"] = $username;
				$_SESSION["user_id"] = $user_id;
				$_SESSION["order_id"] = $order_id;
				$_SESSION["money"] = $money;
				
				//set cookie
				if(isset($_POST["cookie"])){
					
					$userinfo = array("username" => "$username", "pwd" => "$pwd");
				
					$secureKey = 'linglinglingling'; //key
					$str = serialize($userinfo);
					$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secureKey, $str, MCRYPT_MODE_ECB));
					setcookie('user', $str, time()+3600*24);
				}
				
				
				echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."';</script>";  
				//echo "Success!"; 
				//header('Refresh: 1; url=index.php');
            }  
            else{
				
				echo "<script>alert('Username or password is incorrect!'); history.go(-1);</script>";  
                //echo "Username or password is incorrect!"; 
				//header('Refresh: 1; url=index.php'); 
            }  
        }  
}
}
?>