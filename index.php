<html>
<head>
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

echo "你的ip是".$yourip."</br>";
echo "来自".$country.$region.$city."（".$isp."）";

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
