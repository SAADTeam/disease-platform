<?php
/*
 * 前台首页控制器
 */
class IndexAction extends Action
{
    public function index()
    {
        $latestNews = M( 'news' )->order('newsDate desc')->limit(3)->select();
        $latestNotification = M( 'notification' )->order('notificationDate desc')->limit(3)->select();
        
        $this->latestNews = $latestNews;
        $this->latestNotification = $latestNotification;
        
        $this->display();
    }
}

?>

