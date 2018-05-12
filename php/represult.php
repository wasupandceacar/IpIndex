<?php
$path=$_POST['rpy'];
exec("PYTHONIOENCODING=utf-8 /usr/bin/python3.5 rep.py ".$path,$array,$ret);
$arr = array();
if($ret==0){
    $row['result']='success';
    $row['base_info']=$array[0]."</br>".$array[1]."</br>".$array[2]."</br>".$array[3]."</br>".$array[4]."</br>";
    $error_num=intval($array[5]);
    $row['error_num']=$error_num;
    $row['error']='';
    for($i=0;$i<$error_num;$i++){
        $row['error'].=$array[6+$i]."</br>";
    }
    $pt=6+$error_num;
    $level1=intval($array[$pt]);
    $row['level1_num']=$level1;
    $row['level1']='';
    for($i=0;$i<$level1;$i++){
        $row['level1'].=$array[$pt+1+$i]."</br>";
    }
    $pt+=1+$level1;
    $level2=intval($array[$pt]);
    $row['level2_num']=$level2;
    $row['level2']='';
    for($i=0;$i<$level2;$i++){
        $row['level2'].=$array[$pt+1+$i]."</br>";
    }
    $pt+=1+$level2;
    $level3=intval($array[$pt]);
    $row['level3_num']=$level3;
    $row['level3']='';
    for($i=0;$i<$level3;$i++){
        $row['level3'].=$array[$pt+1+$i]."</br>";
    }
    $pt+=1+$level3;
    array_push($arr, $row);
}else{
    $row['result']='error';
    array_push($arr, $row);
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>