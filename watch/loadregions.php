<?php
function GETTHISVID($sql,$vid,$from,$to){
    if($to=="日本节点"){
        $to="ap-northeast-1";
    }else if($to=="上海节点"){
        $to="cn-shanghai";
    }
    $run='SELECT `'.$to.'` FROM videos_ids where `'.$from.'`="'.$vid."\";";
    $result=$sql->query($run);
    if(!$result){return mysqli_error($sql);}
    while ($row=mysqli_fetch_array($result)) {
        $out=$row[$to];
    }
    return $out;
}