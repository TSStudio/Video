<?php
$vid=$_GET['v'];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <script src="https://g.alicdn.com/de/prismplayer/2.8.2/aliplayer-h5-min.js"></script>
        <link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.2/skins/default/aliplayer-min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <script>
            var player = new Aliplayer({
            id: 'J_prismPlayer',
            width: '100%',
            autoplay: true,
            //播放方式二：点播用户推荐
            vid : '<?=$vid?>',
            playauth : 'ddd',
            cover: 'https://resource.tmysam.top/i/Cover-PREVIEW.png',
            },function(player){
                console.log('播放器创建好了。')
           });
        </script>
    </body>
    <script>
        function getAuth(){
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("POST","https://account.tmysam.top/Video/apis/getAuth.php",false);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("vid=<?=$vid?>");
            newPlayAuth=xmlhttp.responseText;
            player.replayByVidAndPlayAuth(<?=$vid?>, newPlayAuth);
        }
        //每50秒发送一次请求以获取PlayAuth
        getAuth();
        player.play();
        window.setInterval(getAuth, 50000);
    </script>
</html>