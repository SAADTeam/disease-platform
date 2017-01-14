<?php

class CommonAction extends Action
{
    public function _initialize() {
        if (!isset($_SESSION['userId']) || !isset($_SESSION['userName']) || !isset($_SESSION['userType']) ) {
            $this->error('您还没有登录！' , U( 'Admin/Login/index' ));
        }
        else if( getUserLevel($_SESSION['userType'])<3 ){
            $this->error('您的权限不足，不能进入后台管理系统！' , U( 'Admin/Login/index' ));
        }
    }
}

