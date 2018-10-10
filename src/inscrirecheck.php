<?php   
        $username = htmlspecialchars($_POST["username"]);  
        $pwd = $_POST["pwd"];  
        $repwd = $_POST["repwd"];  
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$email = $_POST["email"];
		$birthday = $_POST["birthday"];
		
        if($username == "" || $pwd == "" || $repwd == ""){  
            echo "Please confirm your information!";
			header('Refresh: 1; url=index.php');
        }  
        else{
			  
            if($pwd == $repwd){  
				include("mysqlconfig.php");
                $sql = "select username from user where username = '$username'";
                $result = mysql_query($sql);
                $num = mysql_num_rows($result);
				
                if($num){  
                    echo "User name already exists, please use another user name!"; 
					header('Refresh: 1; url=index.php'); 
                }  
                else{  
                    $sql_insert = "insert into user(username,age,sex,email,birthday,pwd) values('$username','$age','$sex','$email','$birthday','$pwd')";  
                    $result_insert = mysql_query($sql_insert); 
					 
                    if($result_insert){  
                        echo "Success!"; 
						header('Refresh: 1; url=index.php');
                    }  
                    else{  
                        echo "System is busy!";
						header('Refresh: 1; url=index.php');  
                    }  
                }  
            }  
            else{  
                echo "<script>alert('wrong'); history.go(-1);</script>";
				header('Refresh: 1; url=index.php');  
            }  
        }  
 
?>