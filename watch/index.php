<?php
session_start();
//error_reporting(0);
include './loadregions.php';
include '../apis/config.php';
$vid=$_GET['v'];
if(empty($vid)){
    header("HTTP/1.1 404 Not Found");
    die("Unknown Video");
}
include './regionset.php';
$sql=new mysqli($host,$user,$pass,$data);
include './check.php';
if(!empty($_SESSION['username'])){
    $username=$_SESSION['username'];
    $display='<a href="../../logout.php?URL=Video%2fwatch%3fv%3d'.$vid.'"><i class="iconfont icon-Logout"></i>Logout</a>';
}else{
    $username='未登录';
    $display='<a href="../../loginform.php?URL=Video%2fwatch%3fv%3d'.$vid.'&code=105"><i class="iconfont icon-Login"></i>Login</a>';
    if($isNeed){
        include './LoginisRequired.php';
    }
}
include './stat.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" />
        <title>未知标题 - TSS Video</title>
        <script>var vidx="<?=$vid?>";</script>
        <script src="https://g.alicdn.com/de/prismplayer/2.8.2/aliplayer-h5-min.js"></script>
    </head>
    <body>
        <div class="topbar">
            <font class="doctitle">TSS Video</font>
            <div class="topelement">
                <i class="iconfont icon-world bigicon"></i>
                <div class="topelement" id="region">
                    <p>Now Using:<i class="iconfont icon-server"></i><?=$region?></p><br>
                    <a href="<?=$otheradd?>&v=<?=GETTHISVID($sql,$vid,$_SESSION["region"],$other)?>">Switch to:<i class="iconfont icon-switch"></i><?=$other?></a>
                </div>
                <div class="topelement" id="userinfo">
                    <i class ="iconfont icon-user bigicon"></i>
                    <p><?=$username?></p><br>
                    <?=$display?>
                </div>
            </div>
        </div><!--顶栏-->
        <div id="infobar">
            <h4 id="titlebar">未知标题</h4>
            <h6 id="timebar"><i class="iconfont icon-time"></i></h6>
            <a href="#" onclick="alert('我们已收到您的反馈');"><i class="iconfont icon-report"></i>视频投诉</a>
        </div>
        <div  class="prism-player" id="J_prismPlayer" style="margin:auto;"></div>
        <div id="desbox">
            <i class="iconfont icon-detail bigicon"></i>
            <div id="des"></div>
        </div>
        <script>
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("POST","https://account.tmysam.top/Video/apis/getAuth.php",false);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("vid="+vidx);
            var newPlayAuth1=xmlhttp.responseText;
            var player = new Aliplayer({
            id: 'J_prismPlayer',
            width: '70%',
            height: '70%',
            autoplay: true,
            enableSystemMenu: true,
            //播放方式二：点播用户推荐
            vid : vidx,
            playauth : newPlayAuth1,
            cover: 'https://resource.tmysam.top/i/Cover-PREVIEW.png',
            },function(player){
                console.log('Player ready');
           });
        </script>
    </body>
    <script src="js/loader.js"></script>
</html>