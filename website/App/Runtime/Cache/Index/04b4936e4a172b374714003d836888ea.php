<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>发表文章-重要热带病传播入侵媒介及病原体生物学特性研究平台</title>
    <!-- Bootstrap -->
    <!-- CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <!-- JS -->
    <script src="__PUBLIC__/js/jquery-3.1.0.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    
    <style type="text/css">
    .paper-header {
        background-color: #f16528;
        height: 100px;
    }
    
    a.sitename {
        display: inline-block;
        padding-top: 20px;
        color: #fff;
        font-size: 3.75rem;
        font-style: bold;
        font-weight: bold;
    }
    
    hr {
        border-color: #ccc;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    
    li .list-num {
        color: #777;
        vertical-align: top;
    }
    
    ul li {
        list-style: none;
        margin-left: 0;
        padding-left: 0;
    }
    
    .paper-authors {
        color: #777;
        font-size: 0.8em;
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
                            <li class="active"><a href="<?php echo U( 'Index/PublishArticle' );?>">发表文章</a></li>
                            <li><a href="<?php echo U( 'Index/AcademicExchange' );?>">学术交流</a></li>
                            <li><a href="<?php echo U( 'Index/DataTool' );?>">数据/工具</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
        
        <!-- 文章计数变量  -->
            <?php $count = 1; ?>
        <div>
            <h1 class="text-center">所有发表文章</h1>
            <?php if(is_array($publishArticleBody)): foreach($publishArticleBody as $key=>$value): ?><h4><?php echo ($key); ?></h4>
                <hr>
                <ul>
                    <?php if(is_array($value)): foreach($value as $key=>$v): ?><li>
                        <p class="list-num inline-block"><?php echo ($count++); ?></p>
                        <div class="inline-block">
                            <a href="<?php echo ($v['publishArticlelink']); ?>"><?php echo ($v['publishArticleTitle']); ?></a>
                            <p class="paper-authors"><?php echo ($v['author']); ?></p>
                        </div>
                    </li><?php endforeach; endif; ?>
                </ul>
                <br><?php endforeach; endif; ?>
        </div>
        
    </div>
</body>

</html>