<?php
 $ask=$_POST['ask'];
 $answer=$_POST['answer'];
 //读取
 $mysql_server_name='138.68.41.21';
 $mysql_username='root';
 $mysql_password='1248163264128';
 $mysql_database='lexicon';
 $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
 mysql_query("set names 'utf8'");
 mysql_select_db($mysql_database);
 $sqlexist = "select ask from simple_lexicon where ask='$ask'";
 $askexist = mysql_query($sqlexist);
 if (!mysql_num_rows($askexist)) {
   $sqlwrite = "insert into simple_lexicon (ask,answer) values ('$ask','$answer')";
   mysql_query($sqlwrite);
   echo "小⑨懂了！";
 }else{
   echo "小⑨已经学过这句话了，所以不能再学一次了QAQ";
 }
 mysql_close();
?>
