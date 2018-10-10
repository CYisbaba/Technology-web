 <?php
 session_start();
 if(empty($_SESSION["username"])){
  header("location:index.php");
  exit;
 } 
 ?>
<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
</head>
<body class="body">

<?php include 'header.php'?>
<div id="content">
		<li>
			<div>
				<img src="../image/Dujardin - Jeux de société.jpg" width="148" height="133" id="Dujardin - Jeux de société">
    </div>
			<div>
				Dujardin - Jeux de société -Burger Quiz - 01095
			</div>
			<span>EUR 24,90<button>Acheter cet article</button></span>
		</li>
		<li>
			<div>
				<img src="../image/Soft Squishy toys.jpg" width="180" height="148" id="Soft Squishy toy">
	    </div>
			<div>
				Isuper Soft Squishy toys,Galaxy mignon cerf jouet cadeau pour les enfants et les adultes (11cm)
			</div>
			<span>EUR 2,90<button>Acheter cet article</button></span>
		</li>
		<li>
			<div>
				<img src="../image/LEGO Creator - Le dinosaure féroce.jpg" width="153" height="131" id="LEGO Creator - Le dinosaure féroce">
	    </div>
			<div>
				LEGO Creator - Le dinosaure féroce - 31058 - Jeu de Construction
			</div>
			<span>EUR 10,84<button>Acheter cet article</button></span>
		</li>
</div>
<?php include 'footer.php'?>

</body>
