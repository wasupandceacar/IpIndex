<?php
 $time=$_POST['time'];
 $msg=$_POST['msg'];
 $ipid=(int)$_POST['ipid'];
 $lan=$_POST['lan'];
 //读取
 $mysql_server_name='138.68.41.21';
 $mysql_username='root';
 $mysql_password='1248163264128';
 $mysql_database='cirno';
 $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
 mysql_query("set names 'utf8'");
 mysql_select_db($mysql_database);
 $sqlexist = "select comment_id from comment where time='$time' and ip_id=$ipid";
 $commentexist = mysql_query($sqlexist);
 if (!mysql_num_rows($commentexist)) {
   $sqlwrite = "insert into comment (time,comment,ip_id) values ('$time','$msg',$ipid)";
   mysql_query($sqlwrite);
   if($lan=='ch'){
     echo "感谢你的建议(`・ω・´)";
   }else if($lan=='en'){
     echo "Thank you for your idea(`・ω・´)";
   }
 }else{
   if($lan=='ch'){
     echo "防止刷子，一天只能提交一次建议(`・ω・´)";
   }else if($lan=='en'){
     echo "You can only submit once in a day(`・ω・´)";
   }
 }
 mysql_close();
?>
