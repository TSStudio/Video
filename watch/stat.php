<?php
$usr=empty($_SESSION['username'])?"GUEST":$_SESSION['username'];
$values='"'.$usr.'","'.$vid.'","'.$region.'","'.time().'"';
$sql->query('INSERT INTO `video_watches` (`username`,`vid`,`usingNode`,`time`) VALUES ('.$values.');');
echo mysqli_error($sql);