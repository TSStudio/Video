<?php
header("HTTP/1.1 403 Forbidden");
echo'
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" />
        <title>访问拒绝 - TSS Video</title>
        <script>var vidx="'.$vid.'";</script>
    </head>
    <body>
        <div class="topbar">
            <font class="doctitle">TSS Video</font>
            <div class="topelement">
                <i class="iconfont icon-world bigicon"></i>
                <div class="topelement" id="region">
                    <p>Now Using:<i class="iconfont icon-server"></i>'.$region.'</p><br>
                    <a href="'.$otheradd.'&v='.GETTHISVID($sql,$vid,$_SESSION["region"],$other).'">Switch to:<i class="iconfont icon-switch"></i>'.$other.'</a>
                </div>
                <div class="topelement" id="userinfo">
                    <i class ="iconfont icon-user bigicon"></i>
                    <p>'.$username.'</p><br>
                    '.$display.'
                </div>
            </div>
        </div><!--顶栏-->
        <div id="infobar">
            <h4 id="titlebar">访问拒绝</h4>
            <h6 id="timebar"><i class="iconfont icon-time"></i></h6>
        </div>
        <h1>访问拒绝，你需要登录</h1>
        <div id="desbox">
            <i class="iconfont icon-detail bigicon"></i>
            <div id="des"></div>
        </div>
    </body>
    <script src="js/loader.js"></script>
</html>';
die();
?>