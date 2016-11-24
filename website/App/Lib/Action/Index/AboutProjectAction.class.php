<?php
/*
 * 显示新闻动态页控制器
 */
class AboutProjectAction extends Action
{
    public function index()
    {
        //显示页面左侧部分
        $species = M( 'speciesproject' )->order('creature_creatureId asc')->select();
        
        //$temp为新的creatureId
        //将物种名称按生物存入speciesName二维数组中
        $creatureName = '';
        $speciesName = array();
        $temp = -999;
        $j = 0;
        foreach ( $species as $v )
        {
            if( $temp != $v['creature_creatureId'] )
            {
                $temp = $v['creature_creatureId'];
                $creatureName = M( 'creature' )->where( 'creatureId=' . $v['creature_creatureId'] )->getField( 'creatureName' );
                $j = 0;
            }
            $speciesName[$creatureName][$j] = $v['speciesName'];
            ++$j;
        }
        $this->speciesName = $speciesName;
        
        //显示页面右侧部分
        
        $this->display();
    }
 
}

