<?php
/*
 * 新增用户页控制器
 */
class AddUserAction extends Action
{
    public function index()
    {
        $researchTeam = M( 'researchteam' )->getField( 'researchTeamId , researchTeamName' );
        $this->researchTeam = $researchTeam;
        
        $this->display();
    }
    
    public function addUser()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
//        if (!filled_out($_POST)) {
//            $this->error('输入项不能为空！');
//        }
        
        //获取表单数据
        $userName = I( 'userName' , '' , 'htmlspecialchars' );
        $password = I( 'password' , '' , 'htmlspecialchars' );
        $userInfo = I( 'userInfo' , '' , 'htmlspecialchars' );
        $userResearchDirection = I( 'userResearchDirection' , '' , 'htmlspecialchars' );
        $userResearchResult = I( 'userResearchResult' , '' , 'htmlspecialchars' );
        $userType = I( 'userType' , '' , 'htmlspecialchars' );
        $researchTeamId = I( 'researchTeamId' , '' , 'htmlspecialchars' );
        
        if( $researchTeamId=='null' || $researchTeamId=='' )
            $researchTeamId = null;
        
        //判断权限操作
        if( ( $userType=='superAdminUser' && getUserLevel( $_SESSION['userType'] )<5 )
                || ( $userType=='adminUser' && getUserLevel( $_SESSION['userType'] )<5 )
                || ( $userType=='labUser' && getUserLevel( $_SESSION['userType'] )<4 )
                || ( $userType=='registerUser' && getUserLevel( $_SESSION['userType'] )<3 )
                || ( $userType=='anonymousUser' && getUserLevel( $_SESSION['userType'] )<2 )
                ){
            $this->error('对不起，您没有权限进行此操作！');
        }
        
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
            'userResearchResult' => $userResearchResult ,
            'researchTeam_researchTeamId' => $researchTeamId
        );
        
        if ( M('user')->data($data)->add() ) {
            $this->success( '新增用户成功！', U( 'Admin/AddUser/index' ) );
        }
        else{
            $this->error( '新增用户遇到异常失败，请重试！' );
        }
    }
 
}

