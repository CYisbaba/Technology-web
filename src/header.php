<div style="width:100%; height:50px"></div>
<div id="header">
	<div id="logo"></div>
	<div id="banner"><a>YOU Know?!</a></div>
</div>
<?php  
	session_start();
	if(empty($_SESSION["username"])){?>
<div id="navmenu">
	<nav>
	<form action="logincheck.php" method="post">
		<ul>
			<li></li>
			<li><a href="index.php">Homepage</a></li>
			<li><a href="produire.php">Product</a></li>
			<li><a href="search.php">Search</a></li>
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
				<a href="inscrire.php" style="color:white"><input type="submit" style="width:60px" value="login" />Inscrire</a>
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
		<ul>
			<li></li>
			<li><a href="index.php">Homepage</a></li>
			<li><a href="produire.php">Product</a></li>
			<li><a href="search.php">Search</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li><a><?php echo $_SESSION["username"]; ?></a></li>
			<li><a href="logout.php?action=logout" style="color:red">LOGOUT</a></li>
		</ul>
	</nav>
</div>
<?php
	}?>