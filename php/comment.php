<?php
 include '../php/functioncollection.php';
 $time=$_POST['time'];
 $msg=$_POST['msg'];
 $ipid=(int)$_POST['ipid'];
 $lan=$_POST['lan'];
 //读取
 loginToDB('cirno');
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
