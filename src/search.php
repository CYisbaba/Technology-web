<!DOCTYPE html>
<html>
<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
<link href="../css/search.css"/ rel="stylesheet" type="text/css" />
</head>
<body class="body">

<?php include 'header.php'?>

	<div id="content">
		<form action="search_result.php" method="POST" id="search_form">
 			<div class='form'>
   				<input type="text" name="uname" placeholder="Search here..." id="uname">
     			<button type="submit">search</button>
 			</div>
		</form>
		
	</div>

<?php include 'footer.php'?>

</body>
</html>