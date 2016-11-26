<?php
/*
 * 显示通知公告页控制器
 */
class NotificationAction extends Action
{
    public function index()
    {
        //从数据库读取相应的新闻信息
        $notification = M( 'notification' )->order('notificationDate desc')->select();
        $this->notification = $notification;
        
        $this->display();
    }
    
    public function detail()
    {
        //获取GET参数
        $notificationId = I( 'notificationId' , '' , 'htmlspecialchars' );
        
        //从数据库读取相应的新闻内容
        $notificationBody = M( 'notification' )->where( array( 'notificationId' =>$notificationId ) )->find();
        $this->notificationBody = $notificationBody;
        
        $this->display();
    }
 
}

