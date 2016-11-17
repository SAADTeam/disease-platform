<?php
return array(
    //开启分组模式
    'APP_GROUP_LIST' => 'Index,Admin' ,
    //默认分组
    'DEFAULT_GROUP' => 'Index' , 
    
    //模板文件后缀名
    'TMPL_TEMPLATE_SUFFIX' => '.html' , 
    //伪静态后缀名
    //URL_HTML_SUFFIX => 'aspx' ,
    
    //U函数生成的地址形式
   'URL_MODEL' => 1 ,
    
    //模板输出指定“.”编译为数组
   // 'TMPL_VAR_IDENTIFY' => 'array' ,
    
    //数据库链接
    'DB_TYPE'   => 'mysql',                 // 数据库类型
    'DB_HOST'   => 'localhost',          // 服务器地址
    'DB_NAME'   => 'Forum',             // 数据库名
    'DB_USER'   => 'root',                  // 用户名
    'DB_PWD'    => '',       // 密码
    'DB_PORT'   => 3306,                  // 端口
    'DB_PREFIX' => ''                        // 数据库表前缀
);