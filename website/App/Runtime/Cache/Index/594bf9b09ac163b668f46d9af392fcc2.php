<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>研究团队-重要热带病传播入侵媒介及病原体生物学特性研究平台</title>
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
            document.getElementById( "researchTeamBlock" ).style.display="none";
            document.getElementById( "userBlock" ).style.display="none";
            document.getElementById( infoType ).style.display="block";
        }
    </script>
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
                            <li class="active"><a href="<?php echo U( 'Index/ResearchTeam' );?>">研究团队</a></li>
                            <li><a href="<?php echo U( 'Index/News' );?>">新闻动态</a></li>
                            <li><a href="<?php echo U( 'Index/Notification' );?>">通知公告</a></li>
                            <li><a href="<?php echo U( 'Index/ProjectProgress' );?>">项目进展</a></li>
                            <li><a href="<?php echo U( 'Index/PublishArticle' );?>">发表文章</a></li>
                            <li><a href="<?php echo U( 'Index/AcademicExchange' );?>">学术交流</a></li>
                            <li><a href="<?php echo U( 'Index/DataTool' );?>">数据/工具</a></li>
                        </ul>
                        <a class="btn btn-primary  navbar-btn navbar-right" href="<?php echo U( 'Index/Register' );?>" role="button">注册</a>
<!--                <a class="btn btn-success  navbar-btn navbar-right" href="<?php echo U( 'Index/Login' );?>" role="button">登录</a>-->
                <?php echo check_login_navigation();?>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
    
    <!--sidebar-->
    <div class="sidebar panel panel-primary col-md-2 nav nav-sidebar">
        <div class="panel-body">
            <a href="<?php echo U( 'Index/ResearchTeam/index' , array( 'getResearchTeamId' =>$mainResearchTeam['researchTeamId'] ) );?>">
                <h4>主要负责团队</h4>
            </a>
            <div class="list-group text-center margin-left-20">
                <?php if(is_array($mainResearchTeam['user'])): foreach($mainResearchTeam['user'] as $key=>$v): ?><a href="<?php echo U( 'Index/ResearchTeam/index' , array( 'getUserId' =>$v['userId'] ) );?>" class="list-group-item"><?php echo ($v['userName']); ?></a><?php endforeach; endif; ?>
            </div>
            
            <h4>参与团队</h4>
            <?php if(is_array($parResearchTeam)): foreach($parResearchTeam as $key=>$value): ?><a href="<?php echo U( 'Index/ResearchTeam/index' , array( 'getResearchTeamId' =>$value['researchTeamId'] ) );?>">
                    <h4 class="margin-left-20"><?php echo ($value['researchTeamName']); ?></h4>
                </a>
                <div class="list-group text-center margin-left-20">
                    <?php if(is_array($value['user'])): foreach($value['user'] as $key=>$v): ?><a href="<?php echo U( 'Index/ResearchTeam/index' , array( 'getUserId' =>$v['userId'] ) );?>" class="list-group-item"><?php echo ($v['userName']); ?></a><?php endforeach; endif; ?>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    
    <!-- main -->
    <div class=" col-md-offset-2 padding-left-40 padding-right-40">
        <div id="researchTeamBlock" class="hiddenStyle">
            <h3> 团队名称：</h3>
            <p><?php echo ($researchTeamInfo['researchTeamName']); ?></p>

            <h3> 团队简介：</h3>
            <p><?php echo ($researchTeamInfo['researchTeamInfo']); ?></p>

            <h3> 研究方向：</h3>
            <p><?php echo ($researchTeamInfo['researchTeamDirection']); ?></p>

            <h3> 课题任务：</h3>
            <p><?php echo ($researchTeamInfo['researchTeamTask']); ?></p>
        
            <!-- 文章计数变量  -->
            <?php $count = 1; ?>
            <h3> 受本项目支持发表的文章：</h3>
            <ul>
                    <?php if(is_array($researchTeamInfo['publisharticle'])): foreach($researchTeamInfo['publisharticle'] as $key=>$v): ?><li>
                            <p class="list-num inline-block"><?php echo ($count++); ?></p>
                                <div class="inline-block">
                                         <a href="<?php echo ($v['publishArticlelink']); ?>"><?php echo ($v['publishArticleTitle']); ?></a>
                                         <p class="paper-authors"><?php echo ($v['author']); ?></p>
                                </div>                
                         </li><?php endforeach; endif; ?>                                                                          
            </ul>
        </div>
        
        <div id="userBlock" class="hiddenStyle">
            <h3> 成员姓名：</h3>
            <p><?php echo ($userInfo['userName']); ?></p>

            <h3> 研究简介：</h3>
            <p><?php echo ($userInfo['userInfo']); ?></p>

            <h3> 研究方向：</h3>
            <p><?php echo ($userInfo['userResearchDirection']); ?></p>
            
            <h3> 研究成果：</h3>
            <p><?php echo ($userInfo['userResearchResult']); ?></p>
        </div>
        
    </div>
    
  </div>
    
        <?php  if( $researchTeamInfo ){ echo "<script type='text/javascript'>showDetail('researchTeamBlock')</script>"; } else if( $userInfo ){ echo "<script type='text/javascript'>showDetail('userBlock')</script>"; } ?>
    
</body>

</html>