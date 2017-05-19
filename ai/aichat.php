<?php
 $msg=$_POST['message'];
 //读取
 $mysql_server_name='138.68.41.21';
 $mysql_username='root';
 $mysql_password='1248163264128';
 $mysql_database='lexicon';
 $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
 mysql_query("set names 'utf8'");
 mysql_select_db($mysql_database);
 $sqlexist = "select answer from simple_lexicon where ask='$msg'";
 $answerexist = mysql_query($sqlexist);
 if (!mysql_num_rows($answerexist)) {
   echo "我不知道怎么回答呀";
 }else{
   $an=mysql_fetch_array($answerexist)['answer'];
   echo $an;
 }
 mysql_close();
?>
