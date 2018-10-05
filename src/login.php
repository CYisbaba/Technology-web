<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
</head>
<body>
<div class="body">
<?php include 'header.php'?>
<div id="content">
<br><br><br><br>
<form class="login-table" name="register" id="register-form" action="inscrire.php" method="post">
		<div class="login-left">
			<label class="username">Username : </label>
			<input type="text" class="yhmiput" name="username" placeholder="Username" id="username">
		</div>
		<div class="login-right">
			<label class="passwd">Password : </label>
			<input type="password" class="yhmiput" name="password" placeholder="Password" id="password">
		</div>

		<div class="login-btn">
			<button type="submit">confirmer</button>
			<button type="reset">reset</button>
		</div>
</form>
</div>
<?php include 'footer.php'?>
</div>
</body>