<?php
/*
 * 显示新闻动态页控制器
 */
class AddConferenceAction extends Action
{
    public function index()
    {
        $this->display();
    }
    
    public function addConference()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $conferenceName = I( 'conferenceName' , '' , 'htmlspecialchars' );
        $conferenceYear = I( 'conferenceYear' , '' , 'htmlspecialchars' );
        $conferenceInfo = I( 'conferenceInfo' , '' , 'htmlspecialchars' );
        
        //将新闻数据插入数据库
        $data = array(
            'conferenceName' => $conferenceName ,
            'conferenceYear' => $conferenceYear ,
            'conferenceInfo' => $conferenceInfo
        );
        $conferenceId = M('academicconference')->data($data)->add();
        if ( !$conferenceId ) {
            $this->error( '发布新闻动态遇到异常失败，请重试！' );
        }
        
        $this->redirect( 'Index/AcademicExchange/index' );
    }
 
}

