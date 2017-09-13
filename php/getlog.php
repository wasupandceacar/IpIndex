<?php
 include '../php/functioncollection.php';
 loginToDB('cirno');
 $id=1;
 $relog="";
 while (1) {
     $sqlexist = "select * from update_log where log_id=$id";
     $logexist = mysql_query($sqlexist);
     if (!mysql_num_rows($logexist)) {
         break;
     } else {
         $re=mysql_fetch_array($logexist);
         $data=$re['data'];
         $log=$re['log'];
         $relog=">&nbsp;".$data."&emsp;".$log."</br>".$relog;
         $id+=1;
     }
 }
 mysql_close();
 echo $relog;
?>
