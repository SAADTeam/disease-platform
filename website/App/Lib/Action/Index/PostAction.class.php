<?php
/*
 * 论坛帖子页控制器
 */
class PostAction extends Action
{
    public function index()
    {
        import('ORG.Util.Page');
        $icon = array(  'audio' , 'chat' , 'link' , 'photo' , 'quote' , 'text' , 'video'  );
        
        $condition = array(
            'type' => $_GET['posttype'] ,
            'deleted' => 0
        );

        //分页显示文章
        $count = M( 'post_header' )->where($condition)->count();
        $page = new Page( $count , 3 );
        $limit = $page->firstRow . ',' . $page->listRows ;
        
        $post = D( 'PostRelation' )->relation(true)->where($condition)->order('posted_time desc')->limit($limit)->select();
        $this->post = $post;
        $this->icon = $icon;
        $this->page = $page->show();
        
        //侧边栏显示popular posts
        $popular_posts = M( 'post_header' )->where($condition)->order('reply_num desc')->limit(3)->select();
        $this->popular = $popular_posts;

        $this->display();
    }
    
    public function delete_post() 
    {
        //修改deleted值为1，表示已经删除
        $data = array(
            'postid' => $_GET['postid'] ,
            'deleted' => 1
        );
        $delete = M( 'post_header' )->save($data);
        if ( !$delete ) {
            $this->error( '删除遇到异常失败，请重试！' );
        }else{
            U( 'index' , array('posttype' => $_GET['posttype'] ) , 'html' , 1 );
        }
    }
    
}

