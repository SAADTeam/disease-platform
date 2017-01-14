<?php
/*
 * 新增新闻动态页控制器
 */
class AddNewsAction extends CommonAction
{
    public function index()
    {
        $this->display();
    }
    
    public function addNews()
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
        $newsTitle = I( 'newsTitle' , '' , 'htmlspecialchars' );
        $newsContent = I( 'newsContent' , '' , 'htmlspecialchars' );
        
        //将新闻数据插入数据库
        $data = array(
            'newsTitle' => $newsTitle ,
            'newsContent' => $newsContent ,
            'newsDate' => time()
        );
        if( M('news')->data($data)->add() )
        {
            $this->success( '新增新闻动态成功！', U( 'Admin/AddNews/index' ) );
        }
        else{
            $this->error( '发布新闻动态遇到异常失败，请重试！' );
        }
    }
 
}

