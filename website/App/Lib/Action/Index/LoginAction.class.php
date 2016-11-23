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
    
    public function verify()
    {
        import( 'ORG.Util.Image' );
        ob_end_clean();
        Image::buildImageVerify();
    }

    public function login()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }

        //验证码是否正确
        if (I('verify', '', 'md5') != session(verify)) {
            $this->error('验证码错误！');
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
           
           $this->redirect( 'Index/Index/index' );
        }
    }
}

