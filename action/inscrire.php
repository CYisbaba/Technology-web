<?php 
	
if(isset($_POST["submit"])){
	
	include("mysqlconfig.php");
  
        $username = htmlspecialchars($_POST["username"]);  
        $pwd = md5($_POST["pwd"]);  
        $repwd = md5($_POST["repwd"]);  
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$email = $_POST["email"];
		$birthday = $_POST["birthday"];
		
        if($username == "" || $pwd == "" || $repwd == ""){
			
			echo "<script>alert('Please confirm your information!'); history.go(-1);</script>";
            //echo "Please confirm your information!";
			//header('Refresh: 1; url=index.php?action=inscrire');
        }  
        else{
			  
            if($pwd == $repwd){
				  
				include("mysqlconfig.php");
				
                $sql = "select username from user where username = '$username'";
                $result = $con -> query($sql);
                $num = $result -> num_rows;
				
                if($num){
					
					echo "<script>alert('User name already exists, please use another user name!'); history.go(-1);</script>"; 
                    //echo "User name already exists, please use another user name!"; 
					//header('Refresh: 1; url=index.php?action=inscrire'); 
                }  
                else{ 
				 
                    $sql_insert = "insert into user(username,age,sex,email,birthday,pwd,money) values('$username','$age','$sex','$email','$birthday','$pwd','0')";  
					$result_insert = $con -> query($sql_insert);
					
					$sql_id = "select user_id,money from user where username = '$username' and pwd = '$pwd'";
					$result_id = $con -> query($sql_id);
					$row_id = $result_id -> fetch_array();
					
					$user_id = $row_id["user_id"];
					$money = $row_id["money"];
					 
                    if($result_insert){
						
						$sql_order = "insert into orders(user_id,type,status) values('$user_id','cart','cart')";
						$result_order = $con -> query($sql_order);
						
						$_SESSION["username"] = $username;
						$_SESSION["money"] = $money;
						$_SESSION["user_id"] = $user_id;
						
						$sql_order = "select * from orders where user_id = '$user_id' and type = 'cart'";
						$result_order = $con -> query($sql_order);
						$row_order = $result_order -> fetch_array();
	
						$order_id = $row_order["order_id"];
						$_SESSION["order_id"] = $order_id;
						
						echo "<script>alert('Success!'); location = '".htmlentities($_SERVER['PHP_SELF'])."';</script>"; 
                        //echo "Success!"; 
						//header('Refresh: 1; url=index.php');
                    }  
                    else{ 
					 
						echo "<script>alert('System is busy!'); history.go(-1);</script>";
                        //echo "System is busy!";
						//header('Refresh: 1; url=index.php?action=inscrire');  
                    }  
                }  
            }  
            else{  
			
                echo "<script>alert('wrong'); history.go(-1);</script>";
				//header('Refresh: 1; url=index.php?action=inscrire');  
            }  
        }  
}
?>