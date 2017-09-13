<?php
 include '../php/functioncollection.php';
 $ask=$_POST['ask'];
 $answer=$_POST['answer'];
 //读取
 loginToDB('lexicon');
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
