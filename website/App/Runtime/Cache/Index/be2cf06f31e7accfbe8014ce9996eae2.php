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
    <script>
        function showDetail( infoType )
        {
            document.getElementById( "basicInfo" ).style.display="none";
            document.getElementById( "progress" ).style.display="none";
            document.getElementById( "publishArticle" ).style.display="none";
            document.getElementById( "relativeArticle" ).style.display="none";
            document.getElementById( infoType ).style.display="block";
        }
    </script>
</head>

<body>
    
    <!--sidebar-->
    <div class="container">
        <!-- Fixed navbar -->
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">中山大学研究平台</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo U( 'Index/Index' );?>">首页</a></li>
                            <li class="active"><a href="<?php echo U( 'Index/AboutProject' );?>">关于项目</a></li>
                            <li><a href="<?php echo U( 'Index/ResearchTeam' );?>">研究团队</a></li>
                            <li><a href="<?php echo U( 'Index/News' );?>">新闻动态</a></li>
                            <li><a href="<?php echo U( 'Index/Notification' );?>">通知公告</a></li>
                            <li><a href="<?php echo U( 'Index/ProjectProgress' );?>">项目进展</a></li>
                            <li><a href="<?php echo U( 'Index/PublishArticle' );?>">发表文章</a></li>
                            <li><a href="<?php echo U( 'Index/AcademicExchange' );?>">学术交流</a></li>
                            <li><a href="<?php echo U( 'Index/DataTool' );?>">数据/工具</a></li>
                        </ul>
                    </div>
                </nav>

        <div class="row">
            <div class="col-md-2 ">
            <div class="sidebar panel panel-primary nav nav-sidebar ">
                <div class="panel-body">
                    <!-- 显示页面左侧部分 -->
                    <?php if(is_array($creature)): foreach($creature as $key=>$value): ?><h4><?php echo ($value['creatureName']); ?></h4>
                        <div class="list-group">
                            <?php if(is_array($value['speciesproject'])): foreach($value['speciesproject'] as $key=>$v): ?><a class="list-group-item" href="<?php echo U( 'Index/AboutProject/index' , array( 'getSpeciesProjectId' =>$v['speciesProjectId'] ) );?>"><?php echo ($v['speciesName']); ?></a><?php endforeach; endif; ?>
                        </div><?php endforeach; endif; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-10 ">
                <div class="panel panel-default ">
                        <div class="panel-body ">
                            <!-- 显示页面右侧部分 -->
                            <div class="btn-group-vertical col-md-2 side btn-primary">
                                <button class="btn btn-warning" onclick="showDetail('basicInfo')">基本信息介绍</button>
                                <br>
                                <br>
                                <button class="btn btn-warning" onclick="showDetail('progress')">项目进展</button>
                                <br>
                                <br>
                                <a class="btn btn-warning" href="<?php echo U( 'Index/DataTool/index' , array( 'getSpeciesProjectId' =>$speciesBody['speciesProjectId'] ) );?>">相关数据库</a>
                                <br>
                                <br>
                                <button class="btn btn-warning" onclick="showDetail('publishArticle')">项目组发表文章</button>
                                <br>
                                <br>
                                <button class="btn btn-warning" onclick="showDetail('relativeArticle')">相关文章</button>
                            </div>
                            
                            
                            <!-- 基本信息介绍  -->
                            <div class="col-md-10 hiddenStyle" id="basicInfo">
                                <h1 class="text-center"><?php echo ($speciesBody['speciesName']); ?>的基本信息介绍</h1>
                                <p><?php echo ($speciesBody['speciesInfo']); ?></p>
                            </div>
                            <!-- 项目进展  -->
                            <div class="col-md-10 hiddenStyle" id="progress">
                                <h1 class="text-center"><?php echo ($speciesBody['speciesName']); ?>的项目进展</h1>
                                <p><?php echo substr( $speciesBody['projectProgress'] , 0 , 100 );?></p>
                                <a class="btn btn-primary" href="<?php echo U( 'Index/ProjectProgress/index' , array( 'getSpeciesProjectId' =>$speciesBody['speciesProjectId'] ) );?>">More</a>
                            </div>

                            <!-- 文章计数变量  -->
                            <?php $count = 1; ?>
                            <!-- 项目组发表文章  -->
                            <div class="col-md-10 hiddenStyle" id="publishArticle">
                                <h1 class="text-center"><?php echo ($speciesBody['speciesName']); ?>的项目组发表文章</h1>
                                <ul>
                                    <?php if(is_array($speciesBody['publisharticle'])): foreach($speciesBody['publisharticle'] as $key=>$v): ?><li>
                                                <p class="list-num inline-block"><?php echo ($count++); ?></p>
                                                <div class="inline-block">
                                                    <a href="<?php echo ($v['publishArticlelink']); ?>"><?php echo ($v['publishArticleTitle']); ?></a>
                                                    <p class="paper-authors"><?php echo ($v['author']); ?></p>
                                                </div>
                                            </li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                            
                            <!-- 文章计数变量  -->
                            <?php $count = 1; ?>
                            <!-- 相关文章  -->
                            <div class="col-md-10 hiddenStyle" id="relativeArticle">
                                <h1 class="text-center"><?php echo ($speciesBody['speciesName']); ?>的相关文章</h1>
                                <ul>
                                    <?php if(is_array($speciesBody['speciesrelativearticle'])): foreach($speciesBody['speciesrelativearticle'] as $key=>$v): ?><li>
                                                <p class="list-num inline-block"><?php echo ($count++); ?></p>
                                                <div class="inline-block">
                                                    <a href="<?php echo ($v['relativeArticleLink']); ?>"><?php echo ($v['relativeArticleTitle']); ?></a>
                                                </div>
                                            </li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
              </div>
          </div>

        </div>
    
</body>

</html>