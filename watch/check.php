<?php
if(strlen($vid)!=32||strpos(" ",$vid)||strpos(";",$vid)){
    die();
}
$cvid=GETTHISVID($sql,$vid,$_SESSION["region"],"cn-shanghai");
$result=$sql->query('SELECT `isLoginRequired` from `videos` where vid="'.$cvid.'";');
while($row=mysqli_fetch_array($result)){
    $isNeed=$row['isLoginRequired'];
}