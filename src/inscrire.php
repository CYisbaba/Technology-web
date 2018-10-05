<?php


if(!empty($_POST['username']))
{

    include_once './lib/function.php';

    $username = trim($_POST['username']);//mysql_real_escape_string()进行过滤
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    $sex = trim($_POST['age']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);

    //判断用户名不能为空
    if(!$username)
    {
        msg(2, '用户名不能为空');
    }

    if(!$password)
    {
        msg(2, '密码不能为空');

    }

    if(!$repassword)
    {
        msg(2,'确认密码不能为空');
    }

    if($password !== $repassword)
    {
        msg('两次输入密码不一致,请重新输入');
    }

    //数据库连接

    $con = mysqlInit('localhost', 'root', 'root', 'e-commerce');

    if(!$con)
    {
        echo mysql_errno();
        exit;
    }

    //判断用户是否在数据表存在

    $sql = "SELECT COUNT(  `id` ) as total FROM  `im_user` WHERE  `username` =  '{$username}'";

    $obj = mysql_query($sql);

    $result = mysql_fetch_assoc($obj);


    //验证用户名是否存在
    if(isset($result['total']) && $result['total'] > 0)
    {
        msg(2,'用户名已存在,请重新输入');

    }

    //密码加密处理
    $password = createPassword($password);
    unset($obj, $result, $sql);
    //插入数据
    $sql = "INSERT `user`(`username`,`password`) values('{$username}','{$password}')";

    $obj = mysql_query($sql);

    if($obj)
    {
        msg(1,'注册成功','login.php');
//        $userId = mysql_insert_id();//插入成功的主键id
//
//        echo sprintf('恭喜您注册成功,用户名是:%s,用户id:%s', $username, $userId);
//        exit;
    }
    else
    {
        msg(2,mysql_errno());
//        echo mysql_error();
//        exit;
    }


}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Inscrire</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>

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

	</div>
</form>
    

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/layer/2.3/layer.js"></script>
<script>
    $(function () {
        $('#register-form').submit(function () {
            var username = $('#username').val(),
                password = $('#password').val(),
                repassword = $('#repassword').val(),
                email = $('#email').val();
            if (username == '' || username.length <= 0) {
                layer.tips('用户名不能为空', '#username', {time: 2000, tips: 2});
                $('#username').focus();
                return false;
            }
            if (email == '' || email.length <= 0) {
                layer.tips('email不能为空', '#email', {time: 2000, tips: 2});
                $('#email').focus();
                return false;
            }
            if (password == '' || password.length <= 0) {
                layer.tips('密码不能为空', '#password', {time: 2000, tips: 2});
                $('#password').focus();
                return false;
            }

            if (repassword == '' || repassword.length <= 0 || (password != repassword)) {
                layer.tips('两次密码输入不一致', '#repassword', {time: 2000, tips: 2});
                $('#repassword').focus();
                return false;
            }

            return true;
        })

    })
</script>
</html>