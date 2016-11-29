<?php
/*
 * 新增生物页控制器
 */
class AddCreatureAction extends Action
{
    public function index()
    {
        $this->display();
    }
    
    public function addCreature()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        //获取表单数据
        $creatureName = I( 'creatureName' , '' , 'htmlspecialchars' );
        
        //将生物名称插入数据库
        $data = array(
            'creatureName' => $creatureName
        );
        if( M('creature')->data($data)->add() )
        {
            $this->success( '新增生物成功！', U( 'Admin/AddCreature/index' ) );
        }
        else{
            $this->error( '新增生物遇到异常失败，请重试！' );
        }
    }
 
}

