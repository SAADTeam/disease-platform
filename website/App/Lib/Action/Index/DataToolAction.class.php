<?php
/*
 * 显示数据工具页控制器
 */
class DataToolAction extends Action
{
    public function index()
    {
        $getType = I( 'getType' , '' , 'htmlspecialchars' );
        $getSpeciesProjectId = I( 'getSpeciesProjectId' , '' , 'htmlspecialchars' );
        if( $getType )
        {
            $dataToolLink = M( 'datatoollink' )->where( array( 'dataToolLinkType'=>$getType ) )->select();
            if( $getSpeciesProjectId )
            {
                $dataToolLink = M( 'datatoollink' )->where( array( 'dataToolLinkType'=>$getType , 'speciesProject_speciesProjectId'=>$getSpeciesProjectId ) )->select();
            }
            $this->dataToolLink = $dataToolLink;
        }
        $this->speciesProjectId = $getSpeciesProjectId;
        
        $this->display();
    }
 
}

