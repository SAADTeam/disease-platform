<?php
/*
 * 发表帖子页控制器
 */
class NewPostAction extends CommonAction
{
    public function index()
    {
        $this->display();
    }

    public function newpost()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //插入帖子header信息
        $header = array(
            'title' => I( 'title' ) ,
            'type' => I( 'type' ) ,
            'poster' => $_SESSION['username'] ,
            'posted_time' => time()
        );
        $postid = M('post_header')->data($header)->add();
        if ( !$postid ) {
            $this->error( '发布遇到异常失败，请重试！' );
        }
        
        //插入帖子body信息
        $message = I( 'message' );
        $body = array(
            'postid' => $postid ,
            'message' => $message
        );
        $result = M('post_body')->data($body)->add();
        if ( !$result ) {
            $this->error( '发布遇到异常失败，请重试！' );
        }
        
        U( 'Index/Post/index' , array( 'posttype' => I( 'type' ) ) , 'html' , 1 );
    }
    
}

