<?php
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
}

function loginToDB($mysql_database)
{
    error_reporting(E_ALL ^ E_DEPRECATED);
    $mysql_server_name = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '1248163264128';
    $conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("连接错误");
    mysql_query("set names 'utf8'");
    mysql_select_db($mysql_database);
}

function getFileSize($url){
    $fCont = file_get_contents($url);
    $B=strlen($fCont);
    if($B<1024){
        return $B."B";
    }else{
        $KB=round($B/1024,2);
        if($KB<1024){
            return $KB."KB";
        }else{
            $MB=round($KB/1024,2);
            return $MB."MB";
        }
    }
}?>
