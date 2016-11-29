<?php
/*
 * 新增学术会议页控制器
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
        
        if( getUserLevel( $_SESSION['userType'] )<2 ){
            $this->error('对不起，您没有权限进行此操作！');
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
        if( M('academicconference')->data($data)->add() )
        {
            $this->success( '新增学术会议成功！', U( 'Admin/AddConference/index' ) );
        }
        else{
            $this->error( '新增学术会议遇到异常失败，请重试！' );
        }
    }
 
}

