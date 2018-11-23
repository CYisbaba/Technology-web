<div style="width:100%; height:50px"></div>

<div id="header">

	<div id="logo"></div>
    
	<div id="banner"><a>E-commerce</a></div>
    
</div>

<?php
	//if logout  
	if(empty($_SESSION["user_id"])){
		?>
        
<div id="navmenu">

	<nav>
    
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=login" method="post" id="logincheck">
    
		<ul>
			<li></li>
            <li></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">Homepage</a></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=product">Product</a>
            <ul>
            <?php 
			$sql_range = "select * from ranges";
			$result_range = $con -> query($sql_range);
			
			while($row_range = $result_range -> fetch_array()){
				
				echo "<li><a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$row_range["range_id"]."'>".$row_range["name"]."</a></li>";
			}
			?>
            </ul>
            </li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li>
				<br />
				<input name="username" type="text" id="username" style="width:120px; height:20px" maxlength="20" placeholder="Username" required oninvalid="setCustomValidity('Please input your name.');" oninput="setCustomValidity('');"/>
			</li>
			<li>
				<br />
				<input name="pwd" type="password" id="password" style="width:120px; height:20px" maxlength="10" placeholder="Password" required oninvalid="setCustomValidity('Please input your password.');" oninput="setCustomValidity('');"/>
			</li>
            <li>
            	<br />
            	remember<input type="checkbox" name="cookie" id="cookie">
            </li>
			<li>
				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=inscrire" style="color:white"><input type="submit" id="sumbit" name="submit" style="width:60px" value="login" />Inscrire</a>
			</li>       
		</ul>
        
	</form>
    
	</nav>
    
</div>

<?php
	}
	
	//if login
	else{
		
		$sql_money = "select money from user where user_id = '$user_id'";
		$result_money = $con -> query($sql_money);
		$row_money = $result_money -> fetch_array();
		
		$money = $row_money["money"];
?>
    
<div id="navmenu">

	<nav>
    
    	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=search" method="post" id="searchform">
        
		<ul>
        	<li></li>
			<li></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">Homepage</a></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=product">Product</a>
            <ul>
            <?php 
			$sql_range = "select name,range_id from ranges";
			$result_range = $con -> query($sql_range);
			
			while($row_range = $result_range -> fetch_array()){
				
				echo "<li><a href='".htmlentities($_SERVER['PHP_SELF'])."?page=product&range=".$row_range["range_id"]."'>".$row_range["name"]."</a></li>";
			}
			?>
            </ul>
            </li>
			<li>
            <br>
            <input type="text" name="uname" style="width:120px; height:20px" maxlength="20" placeholder="Search here..." required oninvalid="setCustomValidity('Please input your keywords.');" oninput="setCustomValidity('');" id="uname">
            </li>
			<li><br /><input type="submit" id="sumbit" name="submit" style="width:60px" value="Search" /></li>
			<li></li>
            <li></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=cart"><img src="../image/cart.jpg" height="40" width="40"/></a></li>
			<li class="aa"><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=changeinfo"><?php echo $_SESSION["username"]; ?></a>
            <ul>
            <li><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=money"><?php echo $money; ?></a></li>
            <li><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=changeadd">Addresses</a></li>
			<li><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=order">Orders</a></li>
			<li><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?action=logout" style="color:red">LOGOUT</a></li>
            </ul>
            </li>
		</ul>
        
        </form>
        
	</nav>
    
</div>

<?php
	}
?>