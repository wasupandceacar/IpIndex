<?php
 //读取
 $mysql_server_name='138.68.41.21';
 $mysql_username='root';
 $mysql_password='1248163264128';
 $mysql_database='cirno';
 $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
 mysql_query("set names 'utf8'");
 mysql_select_db($mysql_database);
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
