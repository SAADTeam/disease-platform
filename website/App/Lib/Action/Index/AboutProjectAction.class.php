<?php
/*
 * 显示关于项目页控制器
 */
class AboutProjectAction extends Action
{
    public function index()
    {
        //显示页面左侧部分
        $creature = D( 'CreatureRelation' )->relation( 'speciesproject' )->select();
        $this->creature = $creature;
        
        //显示页面右侧部分
        $getSpeciesProjectId = I( 'getSpeciesProjectId' , '' , 'htmlspecialchars' );
        if( $getSpeciesProjectId )
        {            
            $speciesBody = D( 'SpeciesProjectRelation' )->relation(true)->where( array( 'speciesProjectId' =>$getSpeciesProjectId ) )->find();
            $this->speciesBody = $speciesBody;
        }
        
        $this->display();
    }
 
}

