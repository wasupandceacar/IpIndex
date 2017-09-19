<?php
include '../php/functioncollection.php';
loginToDB('lneta');
$sql = "select * from lneta_info";
$result = mysql_query($sql);
$arr = array();
while ($row = mysql_fetch_array($result)) {
    $count=count($row);
    for ($i=0;$i<$count;$i++) {
        unset($row[$i]);
    }
    $row['av']=(int)$row['av'];
    array_push($arr, $row);
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
mysql_close();
