<?php  
	session_start();

        $username = htmlspecialchars($_POST["username"]);  
        $pwd = $_POST["pwd"];  /*md5()*/
		
        if($username == "" || $pwd == ""){  
            echo "Please enter your name and your password!";
			header('Refresh: 1; url=index.php');
        } 
		elseif($username == "admin" || $pwd == "admin"){$_SESSION["admin"]=$username;echo "Admin!";header('Refresh: 1; url=admin.php');} 
        else{
			include("mysqlconfig.php"); 
            $sql = "select username,pwd from user where username = '$username' and pwd = '$pwd'";  
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result);  
			
            if($num){
				$_SESSION["username"]=$username;
				$_SESSION["user_id"]=$user_id;
				echo "Success!"; 
				header('Refresh: 1; url=index.php');
            }  
            else{  
                echo "Username or password is incorrect!"; 
				header('Refresh: 1; url=index.php'); 
            }  
        }  

?>