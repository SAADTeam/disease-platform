<?php
/*
 * 新增发表文章页控制器
 */
class AddPublishArticleAction extends CommonAction
{
    public function index()
    {
        $speciesProject = M( 'speciesproject' )->getField( 'speciesProjectId , speciesName');
        $this->speciesProject = $speciesProject;
        
        $this->display();
    }
    
    public function addPublishArticle()
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
        $publishArticleTitle = I( 'publishArticleTitle' , '' , 'htmlspecialchars' );
        $author = I( 'author' , '' , 'htmlspecialchars' );
        $publishYear = I( 'publishYear' , '' , 'htmlspecialchars' );
        $publishArticlelink = I( 'publishArticlelink' , '' , 'htmlspecialchars' );
        $speciesProjectId = I( 'speciesProjectId' , '' , 'htmlspecialchars' );
        $researchTeamId = M( 'speciesproject' )->where( array( 'speciesProjectId' =>$speciesProjectId ) )->getField( 'researchTeam_researchTeamId' );
        
        //将发表文章数据插入数据库
        $data = array(
            'publishArticleTitle' => $publishArticleTitle ,
            'author' => $author ,
            'publishYear' => $publishYear ,
            'publishArticlelink' => $publishArticlelink ,
            'speciesProject_speciesProjectId' => $speciesProjectId ,
            'researchTeam_researchTeamId' => $researchTeamId
        );
        if( M('publisharticle')->data($data)->add() )
        {
            $this->success( '新增发表文章成功！', U( 'Admin/AddPublishArticle/index' ) );
        }
        else{
            $this->error( '新增发表文章遇到异常失败，请重试！' );
        }
    }
 
}

