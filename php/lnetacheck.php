<?php
 include '../php/functioncollection.php';
 $avid=(int)$_POST['avid'];
 $msg=$_POST['msg'];
 loginToDB('cirno');
 $sqlwrite = "insert into lnetacheck (avid,reason) values ('$avid','$msg')";
 mysql_query($sqlwrite);
 echo "已提交。感谢您的反馈。";
 mysql_close();
?>
