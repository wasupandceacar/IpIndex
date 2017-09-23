<?php
 include '../php/functioncollection.php';
 loginToDB('cirno');
 $id=1;
 $relog="由于本站建立者是个sabi，2017年9月24日前的所有访问以及更新数据已经丢失";
 while (1) {
     $sqlexist = "select * from update_log where log_id=$id";
     $logexist = mysql_query($sqlexist);
     if (!mysql_num_rows($logexist)) {
         break;
     } else {
         $re=mysql_fetch_array($logexist);
         $date=$re['date'];
         $log=$re['log'];
         $relog=">&nbsp;".$date."&emsp;".$log."</br>".$relog;
         $id+=1;
     }
 }
 mysql_close();
 echo $relog;
?>
