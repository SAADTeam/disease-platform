<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>关于项目-重要热带病传播入侵媒介及病原体生物学特性研究平台</title>
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
        padding-left: 20px;
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
                <li><a href="#contact">新闻动态</a></li>
                <li><a href="#contact">通知公告</a></li>
                <li class="active"><a href="#contact">项目进展</a></li>
                <li><a href="#contact">发表文章</a></li>
                <li><a href="#contact">学术交流</a></li>
                <li><a href="#contact">数据/工具</a></li>
                <li><a href="#contact">数据分析</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </nav>
    <!--sidebar-->
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar panel panel-primary col-md-2 nav nav-sidebar ">
                <div class="panel-body">
                    
                    <?php if(is_array($conferenceName)): foreach($conferenceName as $key=>$value): ?><h4><?php echo ($key); ?></h4>
                        <div class="list-group">
                            <?php if(is_array($value)): foreach($value as $key=>$v): ?><a class="list-group-item" href="<?php echo U( 'Index/AcademicExchange/index' , array( 'getConferenceName' =>$v ) );?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
                        </div><?php endforeach; endif; ?>
                    
                </div>
            </div>
            <!-- main block  -->
            <div class="container-fluid">
                <div class="col-md-offset-2 panel panel-default ">
                    <div class="panel-body ">
                        <div>
                            <h1 class="text-center"><?php echo ($conferenceBody['conferenceName']); ?></h1>
                            <p><?php echo ($conferenceBody['conferenceInfo']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>