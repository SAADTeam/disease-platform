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
    <script src="__PUBLIC__/js/jquery-3.1.0.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    
    <style type="text/css">
    body {
        padding-top: 70px;
        padding-left: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        
        <!--fixed nav-->
            <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">中山大学研究平台</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo U( 'Index/Index' );?>">首页</a></li>
                            <li><a href="<?php echo U( 'Index/AboutProject' );?>">关于项目</a></li>
                            <li><a href="<?php echo U( 'Index/ResearchTeam' );?>">研究团队</a></li>
                            <li><a href="<?php echo U( 'Index/News' );?>">新闻动态</a></li>
                            <li class="active"><a href="<?php echo U( 'Index/Notification' );?>">通知公告</a></li>
                            <li><a href="<?php echo U( 'Index/ProjectProgress' );?>">项目进展</a></li>
                            <li><a href="<?php echo U( 'Index/PublishArticle' );?>">发表文章</a></li>
                            <li><a href="<?php echo U( 'Index/AcademicExchange' );?>">学术交流</a></li>
                            <li><a href="<?php echo U( 'Index/DataTool' );?>">数据/工具</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title text-center">通知公告</div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-hover table-striped">
                    
                    <?php if(is_array($notification)): foreach($notification as $key=>$v): ?><tr>
                            <td>
                                <a  class="margin-left-20 pull-left" href="<?php echo U( 'Index/Notification/detail' , array( 'notificationId' =>$v['notificationId'] ) );?>"><?php echo ($v['notificationTitle']); ?></a>
                                <i class="margin-right-20 pull-right"><?php echo date( 'Y-m-d' , $v['notificationDate'] );?></i>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>