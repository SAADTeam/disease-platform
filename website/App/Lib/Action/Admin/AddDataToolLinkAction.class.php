<?php
/*
 * 新增数据工具链接页控制器
 */
class AddDataToolLinkAction extends CommonAction
{
    public function index()
    {
        $speciesProject = M( 'speciesproject' )->getField( 'speciesProjectId , speciesName');
        $this->speciesProject = $speciesProject;
        
        $this->display();
    }
    
    public function addDataToolLink()
    {
        if( !IS_POST ){
            halt('页面不存在');
        }
        if (!filled_out($_POST)) {
            $this->error('输入项不能为空！');
        }
        
        if( getUserLevel( $_SESSION['userType'] )<3 ){
            $this->error('对不起，您没有权限进行此操作！');
        }
        
        //获取表单数据
        $dataToolLinkName = I( 'dataToolLinkName' , '' , 'htmlspecialchars' );
        $dataToolLinkType = I( 'dataToolLinkType' , '' , 'htmlspecialchars' );
        $dataToolLinkUrl = I( 'dataToolLinkUrl' , '' , 'htmlspecialchars' );
        $dataToolLinkInfo = I( 'dataToolLinkInfo' , '' , 'htmlspecialchars' );
        $speciesProjectId = I( 'speciesProjectId' , '' , 'htmlspecialchars' );
        
        //将数据工具链接插入数据库
        $data = array(
            'dataToolLinkName' => $dataToolLinkName ,
            'dataToolLinkType' => $dataToolLinkType ,
            'dataToolLinkUrl' => $dataToolLinkUrl ,
            'dataToolLinkInfo' => $dataToolLinkInfo ,
            'speciesProject_speciesProjectId' => $speciesProjectId
        );
        if( M('datatoollink')->data($data)->add() )
        {
            $this->success( '新增数据工具链接成功！', U( 'Admin/AddDataToolLink/index' ) );
        }
        else{
            $this->error( '新增数据工具链接遇到异常失败，请重试！' );
        }
    }
 
}

