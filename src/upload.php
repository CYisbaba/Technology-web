<?php

if(isset($_POST["name"])){
		$name = $_POST["name"]; 
		$price = $_POST["price"]; 
		$number= $_POST["number"]; 
		$description = $_POST["description"];
		$filename ="../image/".$_FILES["img"]["name"];
		$filename =iconv("UTF-8","gb2312",$filename);
		
//judge file upload		
if($_FILES["img"]["error"]){
    //echo $_FILES["img"]["error"]; 
	//header('Refresh: 1; url=admin.php');
	echo "<script>alert('".$_FILES["img"]["error"]."'); location = 'admin.php';</script>";  
}
else{	

		//judge information	
        if($name == "" || $price == "" || $number == ""|| $description == ""){  
            //echo "Please confirm your information!";
			//header('Refresh: 1; url=admin.php');
			echo "<script>alert('Please confirm your information!'); location = 'admin.php';</script>";
        }
		else{
			
			include("mysqlconfig.php");
			$sql = "select name from produit where name = '$name'";
			$result = $con -> query($sql);
            $num = $result -> num_rows;
			
			//product exit or mot
			if($num && empty($_GET['id'])){
				//echo "This product is already existed!"; 
				//header('Refresh: 1; url=admin.php');
				echo "<script>alert('This product is already existed!'); location = 'admin.php';</script>";
			}
			else{
				
				//judge file's type
				if (($_FILES["img"]["type"] == "image/gif" || $_FILES["img"]["type"] == "image/jpeg" || $_FILES["img"]["type"] == "image/jpg" || $_FILES["img"]["type"] == "image/png" || $_FILES["img"]["type"] == "image/pjpeg") && $_FILES["img"]["size"] < 200000){
					
					//judge file exits or not
					if(file_exists($filename) && empty($_GET['id'])){
                		//echo "This image is already existed!"; 
						//header('Refresh: 1; url=admin.php');
						echo "<script>alert('This image is already existed!'); location = 'admin.php';</script>";
            		}
            		else
            		{
						//modify product
						if(isset($_GET["id"])){
							$id = $_GET["id"];
							$sql_modify = "update produit set name = '$name', number = '$number', price = '$price', description = '$description', img_url = '$filename' where produit_id = '$id'";  
                    		$result_modify = $con -> query($sql_modify); 
						
						//judge insert into mysql
						if($result_modify){
							move_uploaded_file($_FILES["img"]["tmp_name"],$filename); 
                        	//echo "Success!"; 
							//header('Refresh: 1; url=admin.php');
							echo "<script>alert('Success!'); location = 'admin.php';</script>";
                    	}  
                   		else{  
                        	//echo "System is busy!";
							//header('Refresh: 1; url=admin.php');
							echo "<script>alert('System is busy!'); location = 'admin.php';</script>";
                    		}		
						}
						
						//upload new product
						else{
						$sql_insert = "insert into produit(name,number,price,description,img_url) values('$name','$number','$price','$description','$filename')";  
                    	$result_insert = $con -> query($sql_insert);  
						
						//judge insert into mysql
						if($result_insert){
							move_uploaded_file($_FILES["img"]["tmp_name"],$filename); 
                        	//echo "Success!"; 
							//header('Refresh: 1; url=admin.php');
							echo "<script>alert('Success!'); location = 'admin.php';</script>";
                    	}  
                   		else{  
                        	//echo "System is busy!";
							//header('Refresh: 1; url=admin.php');
							echo "<script>alert('System is busy!'); location = 'admin.php';</script>"; 
                    	}
						}
            		}	
				}
				else{
					//echo "Wrong type!"; 
					//header('Refresh: 1; url=admin.php');
					echo "<script>alert('Wrong type!'); location = 'admin.php';</script>";
				}  
			}
		}
}
}
//}