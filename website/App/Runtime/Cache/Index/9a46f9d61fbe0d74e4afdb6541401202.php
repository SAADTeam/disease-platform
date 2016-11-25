<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新闻动态-重要热带病传播入侵媒介及病原体生物学特性研究平台</title>
    <!-- Bootstrap -->
    <!-- CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <!-- JS -->
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/jquery-3.1.0.min.js"></script>
    <style type="text/css">
    body {
        padding-top: 70px;
        padding-left: 10px;
    }
    </style>
</head>

<body>
    <!--fixed nav-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">首页</a></li>
                <li><a href="#about">关于项目</a></li>
                <li><a href="#about">研究团队</a></li>
                <li class="active"><a href="#contact">新闻动态</a></li>
                <li><a href="#contact">通知公告</a></li>
                <li><a href="#contact">项目进展</a></li>
                <li><a href="#contact">发表文章</a></li>
                <li><a href="#contact">学术交流</a></li>
                <li><a href="#contact">数据/工具</a></li>
                <li><a href="#contact">数据分析</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </nav>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title text-center"><?php echo ($newsBody['newsTitle']); ?></div>
            </div>
            <div class="panel-body text-center" style="height:600px;">
                <?php echo ($newsBody['newsContent']); ?>
            </div>
        </div>
    </div>
</body>

</html>