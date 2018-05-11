<?php
include '../php/functioncollection.php';
loginToDB('cirno');
$sql = "select * from chicken_rank";
$result = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_array($result)) {
    $count=count($row);
    for ($i=0;$i<$count;$i++) {
        unset($row[$i]);
    }
    $row['uid']='<a href="https://space.bilibili.com/'.$row['uid'].'">'.$row['uid'].'</a>';
    array_push($arr, $row);
}
$allarr=array(
    'data'=>$arr
);
echo json_encode($allarr, JSON_UNESCAPED_UNICODE);
mysql_close();