<?php
/*
 * 新增研究团队页控制器
 */
class AddResearchTeamAction extends Action
{
    public function index()
    {
        $this->display();
    }
    
    public function addResearchTeam()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        if( getUserLevel( $_SESSION['userType'] )<4 ){
            $this->error('对不起，您没有权限进行此操作！');
        }
        
        //获取表单数据
        $researchTeamType = I( 'researchTeamType' , '' , 'htmlspecialchars' );
        $researchTeamName = I( 'researchTeamName' , '' , 'htmlspecialchars' );
        $researchTeamDirection = I( 'researchTeamDirection' , '' , 'htmlspecialchars' );
        $researchTeamTask = I( 'researchTeamTask' , '' , 'htmlspecialchars' );
        $researchTeamInfo = I( 'researchTeamInfo' , '' , 'htmlspecialchars' );
        
        //将研究团队数据插入数据库
        $data = array(
            'researchTeamType' => $researchTeamType ,
            'researchTeamName' => $researchTeamName ,
            'researchTeamDirection' => $researchTeamDirection ,
            'researchTeamTask' => $researchTeamTask ,
            'researchTeamInfo' => $researchTeamInfo
        );
        if( M('researchteam')->data($data)->add() )
        {
            $this->success( '新增研究团队成功！', U( 'Admin/AddResearchTeam/index' ) );
        }
        else{
            $this->error( '新增研究团队遇到异常失败，请重试！' );
        }
    }
 
}

