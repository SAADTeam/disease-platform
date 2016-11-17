<?php

class CommonAction extends Action
{
    public function _initialize() {
        if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
            $this->error('您还没有登录！' , U( 'Index/Login/index' ));
        }
    }
}

