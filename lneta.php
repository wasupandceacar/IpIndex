<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="9.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="cache-control" content="max-age=1800">

  <title>Lneta馆</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.bootcss.com/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
  <link rel="stylesheet" href="css/lneta.min.css">
  <base target="_blank">
</head>

<body class="nav-md">
  <?php
  include 'php/functioncollection.php';
  $yourip=getip();
  $datetime = new \DateTime;
  $time=$datetime->format('Y-m-d H:i:s');

  //读取
  loginToDB('visited_ip');

  //查找此ip是否访问
  $sqlexist = "select distinct(ip_id) from lneta_ip_info where ip_address='$yourip'";
  $ipexist = mysql_query($sqlexist);
  $sqlnum = "select distinct(ip_address) from lneta_ip_info";
  $ipdb = mysql_query($sqlnum);
  $ipnum = mysql_num_rows($ipdb);
  if (!mysql_num_rows($ipexist)) {
      $ipid = $ipnum+1;
      $ipnum = $ipid;
      //写入数据库
      $sqlwrite = "insert into lneta_ip_info (ip_id, ip_address,time) values ($ipid,'$yourip','$time')";
      mysql_query($sqlwrite);
      mysql_close();
  } else {
      $ipid = mysql_fetch_array($ipexist)['ip_id'];
      //写入数据库
      $sqlwrite = "insert into lneta_ip_info (ip_id, ip_address,time) values ($ipid,'$yourip','$time')";
      mysql_query($sqlwrite);
      $sqlnum = "select * from lneta_ip_info";
      $ipdb = mysql_query($sqlnum);
      $ipnum = mysql_num_rows($ipdb);
      $sqlnum = "select * from lneta_ip_info where to_days(time) = to_days(now())";
      $ipdb = mysql_query($sqlnum);
      $nowipnum = mysql_num_rows($ipdb);
      mysql_close();
  }
  ?>
  <div class="container body">
    <div class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#coll">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">
            <img id="img1" src="img/logo9.webp" class="img-thumbnail" width="79px">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="coll">
          <ul class="nav navbar-nav">
            <li class="active"><a href="lneta.html" target="_self">统计表格</a></li>
            <li><a href="lnetachart.html" target="_self">统计图形</a></li>
            <li><a href="updatalog.php" target="_self">维护日志</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main_container">
      <div class="title">
        <center>
          <h2 class="h2title">B站Lneta统计站</h2></center>
      </div>
      <div class="subtitle">
        <center>
          <h4>感谢南大东方群（210085479）的小伙伴们和其他圈内好友的支持和援助。如果你发现未收录的视频或者已收录的视频信息错误，请点<a href="lnetacheck.php">这里</a></h4></center>
          <h4>&nbsp;&nbsp;注：仅仅不依靠作品系统而无NM或NB或低封等的，将不被计入在内</h4>
          <h4>&nbsp;&nbsp;统计站捐赠链接加二维码入口（啊啊啊服务器要没钱了）：<a href="alipay.html">1元笑脸迎人</a>&nbsp;&nbsp;<a href="alipay5.html">5元茶水伺候</a>&nbsp;&nbsp;<a href="alipay25.html">25元随意S</a><a style="display:block;text-align:right;" href="donationrank.html">捐赠榜</a></h4>
      </div>
      <div class="table-responsive" data-filter-control="true">
        <table class="table" id="lneta-list">
          <colgroup>
            <col style="width:10%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:30%">
          </colgroup>
          <thead>
            <tr>
              <th>av号</th>
              <th data-filter-control="select">作品</th>
              <th data-filter-control="select">neta类型</th>
              <th>投稿者</th>
              <th>投稿时间</th>
              <th>视频简介</th>
            </tr>
          </thead>
        </table>
      </div>
      <div id="backimg" style="position: fixed; right: 0; bottom: 0; background-image:url('img/mafuyo.webp'); width:19%; height:36%; z-index:-1;">
        <p style="font-size: 12px; position: absolute; left: 170px; top: 79px">总访问：
          <?php
          echo $ipnum;
          ?>
        </p>
        <p style="font-size: 12px; position: absolute; left: 170px; top: 97px">今日：
          <?php
            echo $nowipnum;
          ?>
        </p>
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/toastr.min.js"></script>
    <script src="js/mytable.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/mobile.js"></script>
    <script src="js/sticky.js"></script>
    <script src="js/lneta.js"></script>
    <script type="text/javascript" src="js/webp.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        webp.init();
        lnetaList.init();
      });
    </script>

</body>

</html>
