<?php
 $avid=(int)$_POST['avid'];
 $msg=$_POST['msg'];
 //读取
 $mysql_server_name='138.68.41.21';
 $mysql_username='root';
 $mysql_password='1248163264128';
 $mysql_database='cirno';
 $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
 mysql_query("set names 'utf8'");
 mysql_select_db($mysql_database);
 $sqlwrite = "insert into lnetacheck (avid,reason) values ('$avid','$msg')";
 mysql_query($sqlwrite);
 echo "已提交。感谢您的反馈。";
 mysql_close();
?>
