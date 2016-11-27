<?php
/*
 * 显示新闻动态页控制器
 */
class NewsAction extends Action
{
    public function index()
    {
        //从数据库读取相应的新闻信息
        $news = M( 'news' )->order('newsDate desc')->select();
        $this->news = $news;
        
        $this->display();
    }
    
    public function detail()
    {
        //获取GET参数
        $newsId = I( 'newsId' , '' , 'htmlspecialchars' );
        
        //从数据库读取相应的新闻内容
        $newsBody = M( 'news' )->where( array( 'newsId' =>$newsId ) )->find();
        $this->newsBody = $newsBody;
        
        $this->display();
    }
 
}

