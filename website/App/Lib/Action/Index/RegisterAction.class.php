<?php
/*
 * 注册页控制器
 */
class RegisterAction extends Action
{
    public function index()
    {
        $this->display();
    }

    public function register()
    {
        if (!IS_POST) {
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $userName = I( 'userName' , '' , 'htmlspecialchars' );
        $password = I( 'password' , '' , 'htmlspecialchars' );
        $password2 = I( 'password2' , '' , 'htmlspecialchars' );
        $userInfo = I( 'userInfo' , '' , 'htmlspecialchars' );
        $userResearchDirection = I( 'userResearchDirection' , '' , 'htmlspecialchars' );
        $userResearchResult = I( 'userResearchResult' , '' , 'htmlspecialchars' );
        
        //检查用户名是否已经存在
        $ans = M('user')->where( 'userName=' . $userName)->find();
        if( $ans ){
            $this->error('用户名已经存在！');
        }

        //密码是否一致
        if ($password != $password2) {
            $this->error('输入密码不一致，请重试！');
        }

        $data = array(
            'userName' => $userName ,
            'password' => md5($password) ,
            'userType' => 'registerUser' ,
            'userInfo' => $userInfo ,
            'userResearchDirection' => $userResearchDirection ,
            'userResearchResult' => $userResearchResult
        );
        
        if ( M('user')->data($data)->add() ) {
            $this->success( '注册成功！', U( 'Index/Index/index' ) );
        }
    }
}

