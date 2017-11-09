<?php
$myfile = fopen("../port.txt", "r");
$relog="";
while(!feof($myfile))
{
    $str=fgets($myfile);
    $array=explode(" ", preg_replace("/[\s]+/is"," ",trim($str)));
    if(is_numeric($array[0])){
        $relog.=$array[9]."&nbsp;&nbsp;".$array[0]."包&nbsp;&nbsp;".round(((int)$array[1])/(8388608.0),2)."MB"."</br></br>";
    }
}
fclose($myfile);
echo $relog;
?>