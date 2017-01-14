<?php

function check_login_navigation() {
    if (!isset($_SESSION['userId']) || !isset($_SESSION['userName'])) {
        echo "<a class=\"btn btn-success  navbar-btn navbar-right\" href=\"" . U( 'Index/Login/index' ) . "\">登录</a>";
        }else{
            echo "<a class=\"btn btn-danger  navbar-btn navbar-right\" href=\"" . U( 'Index/Login/logout' ) . "\">退出</a>";
            echo "<p class=\"navbar-text navbar-right\">" . $_SESSION['userName'] . "&nbsp;&nbsp;</p>";
        }
}