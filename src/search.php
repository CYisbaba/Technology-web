<!DOCTYPE html>
<html>
<head>
<link href="../css/main.css"/ rel="stylesheet" type="text/css" />
<link href="../css/search.css"/ rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="body">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/layer/2.3/layer.js"></script>
<script>
    $(function () {
        $('#search_form').submit(function () {
            var uname = $('#uname').val()
            if (uname == '' || username.length <= 0) {
                layer.tips('please enter ', '#uname', {time: 2000, tips: 2});
                $('#uname').focus();
                return false;
            }
            return true;
        })

    })
</script>
</html>