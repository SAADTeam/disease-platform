<?php
/*
 * 显示研究团队页控制器
 */
class ResearchTeamAction extends Action
{
    public function index()
    {
        //显示左侧板块信息
        $mainResearchTeam = D( 'ResearchTeamRelation' )->relation('user')->where( array( 'researchTeamType' =>'main' ) )->find();
        $this->mainResearchTeam = $mainResearchTeam;
        
        $parResearchTeam = D( 'ResearchTeamRelation' )->relation('user')->where( array( 'researchTeamType' =>'participate' ) )->select();
        $this->parResearchTeam = $parResearchTeam;
        
        //显示右侧板块信息
        //研究团队信息
        $getResearchTeamId = I( 'getResearchTeamId' , '' , 'htmlspecialchars' );
        if( $getResearchTeamId )
        {
            $researchTeamInfo = D( 'ResearchTeamRelation' )->relation('publisharticle')->where( array( 'researchTeamId' =>$getResearchTeamId ) )->find();
            $this->researchTeamInfo = $researchTeamInfo;
        }
        
        //成员信息
        $getUserId = I( 'getUserId' , '' , 'htmlspecialchars' );
        if( $getUserId )
        {
            $userInfo = M( 'user' )->where( array( 'userId' =>$getUserId ) )->find();
            $this->userInfo = $userInfo;
        }
        
        $this->display();
    }
 
}

