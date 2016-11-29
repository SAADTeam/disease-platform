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
    <script src="__PUBLIC__/js/jquery-3.1.0.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    
    <style type="text/css">
    body {
        padding-top: 70px;
        padding-left: 20px;
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
                            <li><a href="<?php echo U( 'Index/Notification' );?>">通知公告</a></li>
                            <li><a href="<?php echo U( 'Index/ProjectProgress' );?>">项目进展</a></li>
                            <li><a href="<?php echo U( 'Index/PublishArticle' );?>">发表文章</a></li>
                            <li><a href="<?php echo U( 'Index/AcademicExchange' );?>">学术交流</a></li>
                            <li class="active"><a href="<?php echo U( 'Index/DataTool' );?>">数据/工具</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
    
    
    <div class="list-group col-md-2">
        <a href="<?php echo U( 'Index/DataTool/index' , array( 'getType'=>'data' , 'getSpeciesProjectId'=>$speciesProjectId ) );?>" class="list-group-item">团队数据共享</a>
        <a href="<?php echo U( 'Index/DataTool/index' , array( 'getType'=>'database' , 'getSpeciesProjectId'=>$speciesProjectId ) );?>" class="list-group-item">站外数据库</a>
        <a href="<?php echo U( 'Index/DataTool/index' , array( 'getType'=>'analysis' , 'getSpeciesProjectId'=>$speciesProjectId ) );?>" class="list-group-item">常用分析工具</a>
    </div>
    
    <?php $count = 1; ?>
    
        <div>
            <h2>数据链接</h2>
            <?php if(is_array($dataToolLink)): foreach($dataToolLink as $key=>$v): ?><a href="<?php echo ($v['dataToolLinkUrl']); ?>"><?php echo ($count++); ?>&nbsp;&nbsp;<?php echo ($v['dataToolLinkName']); ?></a>
                <h3>简介</h3>
                <p><?php echo ($v['dataToolLinkInfo']); ?></p><?php endforeach; endif; ?>
        </div>
    </div>
</body>

</html>