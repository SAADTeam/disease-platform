<?php
/*
 * 显示学术交流页控制器
 */
class AcademicExchangeAction extends Action
{
    public function index()
    {
        //从数据库读取相应的新闻信息
        $conference = M( 'academicconference' )->order('conferenceYear desc')->select();
        
        //$temp为新的年份
        //将会议名称按年份存入conferenceName二维数组中
        $conferenceName = array();
        $temp = 0;
        $j = 0;
        foreach ( $conference as $v )
        {
            if( $temp != $v['conferenceYear'] )
            {
                $temp = $v['conferenceYear'];
                $j = 0;
            }
            $conferenceName[(string)$temp][$j] = $v['conferenceName'];
            ++$j;
        }
        $this->conferenceName = $conferenceName;
        
        
        //如果点击会议的标题则在右侧显示会议的内容
        //获取GET参数
        $getConferenceName = I( 'getConferenceName' , '' , 'htmlspecialchars' );
        if( $getConferenceName )
        {
            $conferenceBody = M( 'academicconference' )->where( array( 'conferenceName' =>$getConferenceName ) )->find();
            $this->conferenceBody = $conferenceBody;
        }
        
        $this->display();
    }
 
}

