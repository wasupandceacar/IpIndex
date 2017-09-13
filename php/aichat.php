<?php
 include '../php/functioncollection.php';
 $msg=$_POST['message'];
 //读取
 loginToDB('lexicon');
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
