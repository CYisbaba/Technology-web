<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
</head>
<body class="body">

<?php include 'header.php'?>

<div id="content">
<form action="inscrirecheck.php" method="post">
Username :<input type="text" name="username" placeholder="Username" id="username" maxlength="20" required oninvalid="setCustomValidity('Please input yourname.');" oninput="setCustomValidity('');">
<BR><BR>
Age :<input type="number" name="age" placeholder="Age" id="age" min="0" max="100" required oninvalid="setCustomValidity('Please input your age.');" oninput="setCustomValidity('');">
<BR><BR>
Sex :<select name="sex">
<option value="0">Male</option>
<option value="1">Female</option>
</select>
<BR><BR>
Email :<input type="email" name="email" id="email" placeholder="Email" required oninvalid="setCustomValidity('Please input your email.');" oninput="setCustomValidity('');">
<BR><BR>
Birthday :<input type="date"name="birthday" placeholder="" id="birthday" required oninvalid="setCustomValidity('Please input your birthday.');" oninput="setCustomValidity('');">
<BR><BR>
Password :<input type="password" name="pwd" placeholder="Password" id="password" maxlength="10" required oninvalid="setCustomValidity('Please input the password.');" oninput="setCustomValidity('');">
<BR><BR>
Confirmer password :<input type="password" name="repwd" placeholder="Repassword" id="repassword" maxlength="10" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
<button type="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>
</div>

<?php include 'footer.php'?>

</body>