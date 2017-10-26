<?php
$myfile = fopen("../port.txt", "r");
$relog=fread($myfile,filesize("../port.txt"));
$relog = str_replace("\n","<br/>",$relog);
$relog = str_replace(" ","&nbsp;",$relog);
fclose($myfile);
echo $relog;
?>