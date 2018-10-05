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
		<div>
			<label class="age">Age : </label>
			<input type="text" class="yhmiput" name="age" placeholder="Age" id="age">
		</div>

		<div>
			<label class="age">Sex : </label>
			<input type="radio" name="sex" value="1" class="sex" checked>male
			<input type="radio" name="sex" value="0" class="sex">female
		</div>

		<div>
			<label class="email">Email : </label>
			<input type="email" name="email" id="email" placeholder="email">
		</div>
		<div>
			<label class="age">Birthday : </label>
			<input type="date" class="yhmiput" name="birthday" placeholder="" id="birthday">
		</div>

		<div class="login-right">
			<label class="passwd">Password : </label>
			<input type="password" class="yhmiput" name="password" placeholder="Password" id="password">
		</div>

		<div class="login-right">
			<label class="passwd">Confirmer_password : </label>
			<input type="password" class="yhmiput" name="repassword" placeholder="Repassword"
			id="repassword">
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