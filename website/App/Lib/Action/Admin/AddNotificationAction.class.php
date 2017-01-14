<?php
/*
 * 新增通知公告页控制器
 */
class AddNotificationAction extends CommonAction
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
        
        if( getUserLevel( $_SESSION['userType'] )<3 ){
            $this->error('对不起，您没有权限进行此操作！');
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
        if( M('notification')->data($data)->add() ){
            $this->success( '新增通知公告成功！', U( 'Admin/AddNotification/index' ) );
        }
        else{
            $this->error( '发布通知公告遇到异常失败，请重试！' );
        }
    }
 
}

