<?php
session_start();
if(empty($_SESSION["admin"])){echo"You cannot in";header('Refresh: 1; url=index.php');}
else{
		$name = $_POST["name"]; 
		$price = $_POST["price"]; 
		$number= $_POST["number"]; 
		$description = $_POST["description"];
		$filename ="../image/".$_FILES["img"]["name"];
		//$filename =iconv("UTF-8","gb2312",$filename);
//judge file upload		
if($_FILES["img"]["error"]){
    echo $_FILES["img"]["error"]; 
	header('Refresh: 1; url=admin.php');   
}
else{	
		//judge information	
        if($name == "" || $price == "" || $number == ""|| $description == ""){  
            echo "Please confirm your information!";
			header('Refresh: 1; url=admin.php');
        }
		else{
			include("mysqlconfig.php");
			$sql = "select name from produit where name = '$name'";
			$result = mysql_query($sql);
            $num = mysql_num_rows($result);
			//product exit or mot
			if($num){
				echo "This product is already existed!"; 
				header('Refresh: 1; url=admin.php'); 
			}
			else{
				//judge file's type
				if (($_FILES["img"]["type"] == "image/gif" || $_FILES["img"]["type"] == "image/jpeg" || $_FILES["img"]["type"] == "image/jpg" || $_FILES["img"]["type"] == "image/png" || $_FILES["img"]["type"] == "image/pjpeg") && $_FILES["img"]["size"] < 20000){
					//judge file exits or not
					if(file_exists($filename)){
                		echo "This file is already existed!"; 
						header('Refresh: 1; url=admin.php');
            		}
            		else
            		{
						$sql_insert = "insert into produit(name,number,price,description,img_url) values('$name','$number','$price','$description','$filename')";  
                    	$result_insert = mysql_query($sql_insert);  
						//judge insert into mysql
						if($result_insert){
							move_uploaded_file($_FILES["img"]["tmp_name"],$filename); 
                        	echo "Success!"; 
							header('Refresh: 1; url=admin.php');
                    	}  
                   		else{  
                        	echo "System is busy!";
							header('Refresh: 1; url=admin.php');  
                    		}		 
            		}	
				}
				else{
					echo "Wrong type!"; 
					header('Refresh: 100; url=admin.php');
				}  
			}
		}
}
}