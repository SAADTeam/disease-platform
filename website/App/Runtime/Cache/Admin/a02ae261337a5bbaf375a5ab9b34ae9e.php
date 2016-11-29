<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__PUBLIC__/js/ie-emulation-modes-warning.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="__PUBLIC__/js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">项目名称</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 dashboard-sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="<?php echo U( '/Admin/Index' );?>">用户</a></li>
                    <li><a href="<?php echo U( '/Admin/AddNews' );?>">新闻</a></li>
                    <li><a href="<?php echo U( '/Admin/AddNotification' );?>">通知</a></li>
                    <li><a href="<?php echo U( '/Admin/AddConference' );?>">学术会议</a></li>
                    <li><a href="<?php echo U( '/Admin/AddCreature' );?>">生物</a></li>
                    <li><a href="<?php echo U( '/Admin/AddSpeciesProject' );?>">物种项目</a></li>
                    <li><a href="<?php echo U( '/Admin/AddSpeciesRelativeArticle' );?>">生物相关文章</a></li>
                    <li><a href="<?php echo U( '/Admin/AddResearchTeam' );?>">研究团队</a></li>
                    <li class="active"><a href="<?php echo U( '/Admin/AddPublishArticle' );?>">发表文章</a></li>
                    <li><a href="<?php echo U( '/Admin/AddDataToolLink' );?>">数据工具链接</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="sub-header">发表文章</h2>
                <form class="form-horizontal" role="form" method="post" action="<?php echo U( 'Admin/AddPublishArticle/addPublishArticle' );?>">
                    <div class="form-group">
                        <label for=“ID” class="col-sm-2 col-md-1 control-label">ID</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" id="ID" type="text" value="1001" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 col-md-1 control-label">标题</label>
                        <div class="col-sm-4 col-md-3">
                            <input type="text" class="form-control" id="inputName" placeholder="" name="publishArticleTitle">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAuthor" class="col-sm-2 col-md-1 control-label">作者</label>
                        <div class="col-sm-4 col-md-3">
                            <input type="text" class="form-control" id="inputAuthor" placeholder="" name="author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputYear" class="col-sm-2 col-md-1 control-label">年份</label>
                        <div class="col-sm-4 col-md-3">
                            <input type="number" class="form-control" id="inputYear" placeholder="" name="publishYear">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLink" class="col-sm-2 col-md-1 control-label">链接</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" id="inputLink" placeholder="" name="publishArticlelink">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputProjectID" class="col-sm-2 col-md-1 control-label">所属物种项目</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" id="inputType"  name="speciesProjectId">
                                <?php if(is_array($speciesProject)): foreach($speciesProject as $key=>$v): ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-offset-1 col-sm-10">
                            <button type="submit" class="btn btn-primary">保存</button>
                            <button class="btn btn-warning">删除</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>

</html>