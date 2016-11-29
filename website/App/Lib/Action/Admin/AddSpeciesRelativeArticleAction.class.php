<?php
/*
 * 新增物种相关文章页控制器
 */
class AddSpeciesRelativeArticleAction extends Action
{
    public function index()
    {
        $speciesProject = M( 'speciesproject' )->getField( 'speciesProjectId , speciesName');
        $this->speciesProject = $speciesProject;
        
        $this->display();
    }
    
    public function addSpeciesRelativeArticle()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        if( getUserLevel( $_SESSION['userType'] )<2 ){
            $this->error('对不起，您没有权限进行此操作！');
        }
        
        //获取表单数据
        $relativeArticleTitle = I( 'relativeArticleTitle' , '' , 'htmlspecialchars' );
        $relativeArticleLink = I( 'relativeArticleLink' , '' , 'htmlspecialchars' );
        $speciesProjectId = I( 'speciesProjectId' , '' , 'htmlspecialchars' );
        
        //将物种相关文章数据插入数据库
        $data = array(
            'relativeArticleTitle' => $relativeArticleTitle ,
            'relativeArticleLink' => $relativeArticleLink ,
            'speciesProject_speciesProjectId' => $speciesProjectId
        );
        if( M('speciesrelativearticle')->data($data)->add() )
        {
            $this->success( '新增物种相关文章成功！', U( 'Admin/AddSpeciesRelativeArticle/index' ) );
        }
        else{
            $this->error( '新增物种相关文章遇到异常失败，请重试！' );
        }
    }
 
}

