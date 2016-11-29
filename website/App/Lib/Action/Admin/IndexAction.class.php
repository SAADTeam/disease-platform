<?php
/*
 * 新增用户页控制器
 */
class IndexAction extends Action
{
    public function index()
    {
        $this->display();
    }
    
    public function addUser()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $userName = I( 'userName' , '' , 'htmlspecialchars' );
        $password = I( 'password' , '' , 'htmlspecialchars' );
        $userInfo = I( 'userInfo' , '' , 'htmlspecialchars' );
        $userResearchDirection = I( 'userResearchDirection' , '' , 'htmlspecialchars' );
        $userResearchResult = I( 'userResearchResult' , '' , 'htmlspecialchars' );
        $userType = I( 'userType' , '' , 'htmlspecialchars' );
        
        //检查用户名是否已经存在
        $ans = M('user')->where( 'userName=' . $userName)->find();
        if( $ans ){
            $this->error('用户名已经存在！');
        }

        $data = array(
            'userName' => $userName ,
            'password' => md5($password) ,
            'userType' => $userType ,
            'userInfo' => $userInfo ,
            'userResearchDirection' => $userResearchDirection ,
            'userResearchResult' => $userResearchResult
        );
        
        if ( M('user')->data($data)->add() ) {
            $this->success( '新增用户成功！', U( 'Admin/Index/index' ) );
        }
        else{
            $this->error( '新增用户遇到异常失败，请重试！' );
        }
    }
 
}

