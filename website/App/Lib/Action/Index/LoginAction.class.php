<?php
/*
 * 登录页控制器
 */
class LoginAction extends Action
{
    public function index()
    {
        $this->display();
    }

    public function login()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $userName = I( 'userName' , '' , 'htmlspecialchars' );
        $password = I( 'password' , '' , 'md5' );
        
        //验证用户名和密码是否正确，若正确，则写入session
        $user = M( 'user' )->where( array( 'userName' => $userName , 'password' =>$password  ) )->find();
        if( !$user ){
            $this->error('用户名或密码错误！');
        }
        else{
           session( 'userId' , $user['userId'] );
           session( 'userName' , $user['userName'] );
           session( 'userType' , $user['userType'] );
           
           $this->success( '登录成功！', U( 'Index/Index/index' ) );
        }
    }
}

