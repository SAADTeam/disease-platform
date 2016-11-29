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
                    <li class="active"><a href="<?php echo U( '/Admin/AddSpeciesProject' );?>">物种项目</a></li>
                    <li><a href="<?php echo U( '/Admin/AddSpeciesRelativeArticle' );?>">生物相关文章</a></li>
                    <li><a href="<?php echo U( '/Admin/AddResearchTeam' );?>">研究团队</a></li>
                    <li><a href="<?php echo U( '/Admin/AddPublishArticle' );?>">发表文章</a></li>
                    <li><a href="<?php echo U( '/Admin/AddDataToolLink' );?>">数据工具链接</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="sub-header">物种项目</h2>
                <form class="form-horizontal" role="form" method="post" action="<?php echo U( 'Admin/AddSpeciesProject/addSpeciesProject' );?>">
                    <div class="form-group">
                        <label for=“ID” class="col-sm-2 col-md-1 control-label">ID</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" id="ID" type="number" value="1001" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 col-md-1 control-label">物种名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="speciesName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputInfo" class="col-sm-2 col-md-1 control-label">物种信息</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputInfo" name="speciesInfo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-sm-2 col-md-1 control-label">项目进展</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" id="inputContent" name="projectProgress"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputType" class="col-sm-2 col-md-1 control-label">研究团队名称</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" id="inputType"  name="researchTeamId">
                                <?php if(is_array($researchTeamId_Name)): foreach($researchTeamId_Name as $key=>$v): ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputType" class="col-sm-2 col-md-1 control-label">所属生物名称</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" id="inputType"  name="creatureId">
                                <?php if(is_array($creature)): foreach($creature as $key=>$v): ?><option value="<?php echo ($v['creatureId']); ?>"><?php echo ($v['creatureName']); ?></option><?php endforeach; endif; ?>
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