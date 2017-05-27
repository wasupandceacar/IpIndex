<html>
<head>
<link rel = "shortcut icon" href="9.ico">
<meta charset="UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sendbutton').on('click', function(e) {
      e.stopPropagation();
      var ipid=parseInt(document.getElementById('ipid').textContent);
      var now = new Date();
      var time=now.format("yyyy-MM-dd");
      var msg=$('#messagebubble').val();
      if(msg.gblen()<=200){
        send(time, msg, ipid);
      }else{
        alert("Too many words. Delete some?")
      }
    });
  });
  function send(time, msg, ipid){
    $.ajax({
      url: "php/comment.php",
      type: 'POST',
      data: "time="+time+"&msg="+msg+"&ipid="+ipid+"&lan=en",
      timeout: 7000,
      error: function () {
        alert("some error");
      },
      success: function (data) {
        alert(data);
      }
    });
  }
  //日期格式化
  Date.prototype.format = function (fmt) { //author: meizz
    var o = {
      "M+": this.getMonth() + 1, //月份
      "d+": this.getDate(), //日
      "H+": this.getHours(), //小时
      "m+": this.getMinutes(), //分
      "s+": this.getSeconds(), //秒
      "q+": Math.floor((this.getMonth() + 3) / 3), //季度
      "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
      for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
  }
  //计算建议长度
  String.prototype.gblen = function() {
    var len = 0;
    for (var i=0; i<this.length; i++) {
        if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) {
             len += 2;
         } else {
             len ++;
         }
     }
    return len;
  }
</script>
</head>
<body>
<div style="float:left; font-family:Consolas;">
<p><?php
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
$sqlnum = "select distinct(ip_address) from ip_info";
$ipdb = mysql_query($sqlnum);
$ipnum = mysql_num_rows($ipdb);
if (!mysql_num_rows($ipexist)) {
    $ipid = $ipnum+1;
    $ipnum = $ipid;
    echo "Welcome to your visit for the first time. You are the ".$ipid."th visitor.</br><br>";
    //写入数据库
    $sqlwrite = "insert into ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
    mysql_query($sqlwrite);
    mysql_close();
} else {
    $ipid = mysql_fetch_array($ipexist)['ip_id'];
    echo "You have visited here! You used to be a ".$ipid."th visitor.</br></br>";
    //写入数据库
    $sqlwrite = "insert into ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
    mysql_query($sqlwrite);
    mysql_close();
}

echo "Your ip is ".$yourip."</br><br>";
echo "Come from ".$country."</br></br>";
echo "Current time ".$time."</br></br>";
echo "There are ".$ipnum." visitors since I built this site(`・ω・´)";

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
}?></p>
<p></br></br></br></br></br></br>
  I haven't decided to do what with this site. But since you find here, </br>
  certainly you know Touhou, as well as ⑨. If you have any idea about what </br>
  my website can do(Touhou or other is OK), please write down in the box below.</br>
  Maybe I will do it?(`・ω・ ´)</br></br></p>
<p><textarea class="messagebubble" id="messagebubble" name="message" rows="10" cols="24"></textarea></p>
<p>
  <button class="sendbutton" id="sendbutton">submit</button>
  <font color="red">Your idea should be not over 200 characters</font>
</p>
</div>
<div><img src="flandre.jpg" width="720" height="680"/><div>
<div class="footer" style="font-family:Consolas;">
  <a style="float:left;" href="index_ch.php">中文页面</a>
	<address style="float:right;">
		<a href="rep.php">Collection of my Touhou STG replays</a>
	</address>
</div>
<p hidden id="ipid">
<?php
echo $ipid;
?>
</p>
</body>
</html>
