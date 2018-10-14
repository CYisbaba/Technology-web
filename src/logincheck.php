<?php  
if((!empty($_GET["action"])) && ($_GET["action"] == "login")){
        $username = htmlspecialchars($_POST["username"]);  
        $pwd = $_POST["pwd"];  /*md5()*/
		
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
			include("mysqlconfig.php"); 
            $sql = "select username,pwd from user where username = '$username' and pwd = '$pwd'";  
            $result = $con -> query($sql);  
            $num = $result -> num_rows;
			
            if($num){
				$_SESSION["username"] = $username;
				echo "<script>alert('Success!'); location = 'index.php';</script>";  
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
?>