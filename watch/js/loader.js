function getAuth(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("POST","https://account.tmysam.top/Video/apis/getAuth.php",false);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("vid="+vidx);
    return xmlhttp.responseText;
}
//每50秒发送一次请求以获取PlayAuth
//window.setInterval(player.replayByVidAndPlayAuth(vidx, getAuth()), 50000);
//发送请求到API以获得封面地址和标题，构建时间
xmlhttp=new XMLHttpRequest();
xmlhttp.open("POST","https://account.tmysam.top/Video/apis/getInfo.php",false);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vid="+vidx);
//返回值处理
titlebar=document.getElementById("titlebar");
timebar=document.getElementById("timebar");
des=document.getElementById("des");
data=JSON.parse(xmlhttp.responseText);
if(data["error"]==true){
    console.error(data["errormsg"]);
}else{
    //返回值生效
    document.title=data["title"];
    titlebar.innerText=data["title"];
    player.setCover("https://resource.tmysam.top"+data["coverAddr"]);
    time=new Date();
    time.setTime(data["createTime"]);
    timeout=time.getFullYear()+"/"+time.getMonth()+"/"+time.getDate()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();
    timebar.innerHTML='<i class="iconfont icon-time"></i>'+timeout;
    des.innerText=data["des"];
}