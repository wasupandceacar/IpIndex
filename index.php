<html>
<head>
<link rel = "shortcut icon" href="9.ico">
<meta charset="UTF-8">
</head>
<body>
<div style="float:left"><img src="flandre.jpg" width="540" height="510"/></div>
<div style="float:left"><?php

$yourip=getip();
$ar=getCity($yourip);
$country=$ar["country"];
$region=$ar["region"];
$city=$ar["city"];
$isp=$ar["isp"];
$datetime = new \DateTime;
$time=$datetime->format('Y-m-d H:i:s');

//读取
$mysql_server_name='138.68.41.21';
$mysql_username='root';
$mysql_password='1248163264128';
$mysql_database='visited_ip';
$conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'");
mysql_select_db($mysql_database);

//查找此ip是否访问
$sqlexist = "select distinct(ip_id) from ip_info where ip_address='$yourip'";
$ipexist = mysql_query($sqlexist);
if (!mysql_num_rows($ipexist)) {
    $sqlnum = "select distinct(ip_address) from ip_info";
    $ipdb = mysql_query($sqlnum);
    $ipnum = mysql_num_rows($ipdb);
    $ipid = $ipnum+1;
    echo "欢迎第一次访问过本站。你是本站第".$ipid."位访问者。</br>";
    //写入数据库
    $sqlwrite = "insert into ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
    mysql_query($sqlwrite);
    mysql_close();
} else {
    $ipid = mysql_fetch_array($ipexist)['ip_id'];
    echo "你曾经访问过本站。你曾经是本站第".$ipid."位访问者。</br>";
    //写入数据库
    $sqlwrite = "insert into ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
    mysql_query($sqlwrite);
    mysql_close();
}

echo "你的ip是".$yourip."</br>";
echo "来自".$country.$region.$city." ".$isp."</br>";
echo "现在时间 ".$time;

function getip()//获取ip
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
}

function getCity($ip = '')
{
    if ($ip == '') {
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url), true);
        $data = $ip;
    } else {
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if ((string)$ip->code=='1') {
            return false;
        }
        $data = (array)$ip->data;
    }

    return $data;
}?>
</div>
</body>
</html>
