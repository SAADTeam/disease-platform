<?php
/*
 * 新增物种项目页控制器
 */
class AddSpeciesProjectAction extends Action
{
    public function index()
    {
        //寻找还没有任何物种项目的研究团队
        $researchTeamId1 = M( 'researchteam' )->getField( 'researchTeamId' , true );
        $researchTeamId2 = M( 'speciesproject' )->getField( 'researchTeam_researchTeamId' , true );
        $researchTeamId_diff = array_diff($researchTeamId1, $researchTeamId2);
        $condition = array( 
            'researchTeamId' => array( 'in' , $researchTeamId_diff ) 
            );
        $researchTeamId_Name = M( 'researchteam' )->where( $condition )->getField( 'researchTeamId , researchTeamName');
        $this->researchTeamId_Name = $researchTeamId_Name;
        
        //显示出所有生物
        $creature = M( 'creature' )->select();
        $this->creature = $creature;
        
        $this->display();
    }
    
    public function addSpeciesProject()
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
        $speciesName = I( 'speciesName' , '' , 'htmlspecialchars' );
        $speciesInfo = I( 'speciesInfo' , '' , 'htmlspecialchars' );
        $projectProgress = I( 'projectProgress' , '' , 'htmlspecialchars' );
        $researchTeamId = I( 'researchTeamId' , '' , 'htmlspecialchars' );
        $creatureId = I( 'creatureId' , '' , 'htmlspecialchars' );
        
        //将物种数据插入数据库
        $data = array(
            'speciesName' => $speciesName ,
            'speciesInfo' => $speciesInfo ,
            'projectProgress' => $projectProgress ,
            'researchTeam_researchTeamId' => $researchTeamId ,
            'creature_creatureId' => $creatureId
        );
        
        if( M('speciesproject')->data($data)->add() )
        {
            $this->success( '新增物种项目成功！', U( 'Admin/AddSpeciesProject/index' ) );
        }
        else{
            $this->error( '新增物种项目遇到异常失败，请重试！' );
        }
    }
 
}

