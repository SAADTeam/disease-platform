<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0038)http://v3.bootcss.com/examples/signin/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title>Signin</title>
    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }
    </style>

    <script src="__PUBLIC__/js/ie-emulation-modes-warning.js"></script>

</head>

<body>
    <div class="container">
        <form class="form-signup" role="form" action="<?php echo U('Index/Register/register');?>" method="post">
            <h2 class="form-signup-heading">注册</h2>
            Username
            <input type="text" name="userName" class="form-control" placeholder="Username" >
            Password
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
            <input type="password" name="password2" class="form-control" placeholder="Password again" required="">
            <br>
            Information
            <input type="text"  name="userInfo" class="form-control" placeholder="User information" required="">
            Research Direction
            <input type="text"  name="userResearchDirection" class="form-control" placeholder="Research Direction">
            Research Result
            <input type="text"  name="userResearchResult" class="form-control" placeholder="Research Result" required="">
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        </form>
    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>