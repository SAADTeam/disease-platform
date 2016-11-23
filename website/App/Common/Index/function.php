<?php

function check_login_navigation() {
    if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
        echo "<a href=\"" . U( 'Index/Login/index' ) . "\">登录</a>";
        }else{
            echo $_SESSION['username'];
        }
}

function check_login_post( $v ) {
    if ( $_SESSION['username']==$v['poster'] ) {
        echo "<a class=\"delete_reply" . "\" href=\""
                . U( 'Index/Post/delete_post' , array( 'postid'=>$v['postid'] , 'posttype'=>$v['type'] ) ) . "\">删除</a>";
        }
}

function check_login_reply( $v ) {
    if ( $_SESSION['username']==$v['poster'] ) {
        echo "<a class=\"delete_reply" . "\" href=\""
                . U( 'Index/Reply/delete_reply' , array( 'replyid' =>$v['replyid'] , 'postid'=>$v['postid'] ) ) . "\">删除</a>";
        }
}

    