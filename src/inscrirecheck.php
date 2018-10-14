<?php 
if((!empty($_GET["id"])) && ($_GET["id"] == "inscrire")){
include("mysqlconfig.php");
  
        $username = htmlspecialchars($_POST["username"]);  
        $pwd = $_POST["pwd"];  
        $repwd = $_POST["repwd"];  
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
                    $sql_insert = "insert into user(username,age,sex,email,birthday,pwd) values('$username','$age','$sex','$email','$birthday','$pwd')";  
					$result_insert = $con -> query($sql_insert); 
					 
                    if($result_insert){
						$_SESSION["username"] = $username;
						echo "<script>alert('Success!'); location = 'index.php';</script>"; 
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