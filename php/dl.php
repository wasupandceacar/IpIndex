<?php
$path=$_POST['rpy'];
exec("PYTHONIOENCODING=utf-8 /usr/bin/python3.5 dl.py ".$path,$array,$ret);
$arr = array();
if($ret==0){
    $row['result']='success';
    array_push($arr, $row);
}else{
    $row['result']='error';
    array_push($arr, $row);
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>