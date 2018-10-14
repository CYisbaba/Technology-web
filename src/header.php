<?php 
include("logincheck.php"); 
include("logout.php");	
include("inscrirecheck.php");
?>

<div style="width:100%; height:50px"></div>
<div id="header">
	<div id="logo"></div>
	<div id="banner"><a>YOU Know?!</a></div>
</div>
<?php  
	if(empty($_SESSION["username"])){?>
<div id="navmenu">
	<nav>
	<form action="index.php?action=login" method="post" id="logincheck">
		<ul>
			<li></li>
            <li></li>
			<li><a href="index.php">Homepage</a></li>
			<li><a href="index.php?action=product">Product</a></li>
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
				<a href="index.php?action=inscrire" style="color:white"><input type="submit" style="width:60px" value="login" />Inscrire</a>
			</li>
		</ul>
	</form>
	</nav>
</div>

<?php
	}
	else{?>
    
<div id="navmenu">
	<nav>
    	<form action="index.php?action=search" method="post" id="searchform">
		<ul>
        	<li></li>
			<li></li>
			<li><a href="index.php">Homepage</a></li>
			<li><a href="index.php?action=product">Product</a></li>
			<li>
            <br>
            <input type="text" name="uname" style="width:120px; height:20px" maxlength="20" placeholder="Search here..." required oninvalid="setCustomValidity('Please input your keywords.');" oninput="setCustomValidity('');" id="uname">
            </li>
			<li><br /><input type="submit" style="width:60px" value="Search" /></li>
			<li></li>
			<li><a href="index.php?action=cart">Cart</a></li>
			<li><a><?php echo $_SESSION["username"]; ?></a></li>
			<li><a href="index.php?action=logout" style="color:red">LOGOUT</a></li>
		</ul>
        </form>
	</nav>
</div>

<?php
	}
?>