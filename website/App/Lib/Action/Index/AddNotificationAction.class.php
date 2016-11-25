<?php
/*
 * 显示新闻动态页控制器
 */
class AddNotificationAction extends Action
{
    public function index()
    {
        $this->display();
    }
    
    public function addNotification()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $notificationTitle = I( 'notificationTitle' , '' , 'htmlspecialchars' );
        $notificationContent = I( 'notificationContent' , '' , 'htmlspecialchars' );
        
        //将通知公告数据插入数据库
        $data = array(
            'notificationTitle' => $notificationTitle ,
            'notificationContent' => $notificationContent ,
            'notificationDate' => time()
        );
        $notificationId = M('notification')->data($data)->add();
        if ( !$notificationId ) {
            $this->error( '发布通知公告遇到异常失败，请重试！' );
        }
        
        $this->redirect( 'Index/Notification/index' );
    }
 
}

