<?php
session_start();
error_reporting(0);
include './config.php';
include '../watch/loadregions.php';
header('Content-type: application/json; charset=utf-8');
$out=array();
$sql=new mysqli($host,$user,$pass,$data);
$vid=GETTHISVID($sql,$_POST['vid'],$_SESSION["region"],"cn-shanghai");
if(strlen($vid)!=32||strpos(" ",$vid)||strpos(";",$vid)){
    $out["error"]=true;
    $out["errormsg"]="Invalid Post Data";
    print(json_encode($out));
    die();
}
$run="SELECT * FROM videos where vid=\"".$vid."\";";
$result=$sql->query($run);
if (!$result) {
    $out["error"]=true;
    $out["errormsg"]='Invalid SQL Response';
    print(json_encode($out));
    die();
}
if(mysqli_num_rows($result)==0){
    $out["error"]=true;
    $out["errormsg"]="Video Does Not Exist";
    print(json_encode($out));
    die();
}
$out['error']=false;
while ($row=mysqli_fetch_array($result)) {
    $out['title']=$row['title'];
    $out['coverAddr']=$row['coverAddr'];
    $out['createTime']=$row['createTime']*1000;
    $out['des']=$row['des'];
}
print (json_encode($out));