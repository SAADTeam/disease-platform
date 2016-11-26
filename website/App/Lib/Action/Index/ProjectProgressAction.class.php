<?php
/*
 * 显示项目进展页控制器
 */
class ProjectProgressAction extends Action
{
    public function index()
    {
        $creature = D( 'CreatureRelation' )->relation( 'speciesproject' )->select();
        $this->creature = $creature;
        
        //显示页面右侧部分
        $getSpeciesProjectId = I( 'getSpeciesProjectId' , '' , 'htmlspecialchars' );
        if( $getSpeciesProjectId )
        {            
            $speciesBody = M( 'speciesproject' )->where( array( 'speciesProjectId'=>$getSpeciesProjectId ) )->find();
            $this->speciesBody = $speciesBody;
        }
        
        $this->display();
    }
 
}

