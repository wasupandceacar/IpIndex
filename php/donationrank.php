<?php
include '../php/functioncollection.php';
loginToDB('cirno');
$sql = "select * from donation_rank order by donation desc";
$result = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_array($result)) {
    $count=count($row);
    for ($i=0;$i<$count;$i++) {
        unset($row[$i]);
    }
    $row['pic_url']='<img src="'.$row['pic_url'].'" width="50" height="50"/>';
    $row['name']='*'.$row['name'];
    $row['donation']='￥'.number_format($row['donation'], 2);
    array_push($arr, $row);
}
$allarr=array(
    'data'=>$arr
);
echo json_encode($allarr, JSON_UNESCAPED_UNICODE);
mysql_close();
