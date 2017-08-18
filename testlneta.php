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
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
  <link rel="stylesheet" href="css/lneta.css">
  <base target="_blank">
</head>

<body class="nav-md">
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
            <img src="logo9.png" class="img-thumbnail" width="79px">
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

      <div style="position: fixed; right: 0; bottom: 0; background-image:url('mafuyo.png'); width:19%; height:36%;">
        <p style="font-size: 12px; position: absolute; left: 170px; top: 79px">总访问：
          <?php
          //读取
          $mysql_server_name='138.68.41.21';
          $mysql_username='root';
          $mysql_password='1248163264128';
          $mysql_database='visited_ip';
          $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
          mysql_query("set names 'utf8'");
          mysql_select_db($mysql_database);

          //查找此ip是否访问
          $sqlnum = "select * from lneta_ip_info";
          $ipdb = mysql_query($sqlnum);
          $ipnum = mysql_num_rows($ipdb);
          echo $ipnum;
          ?>
        </p>
        <p style="font-size: 12px; position: absolute; left: 170px; top: 97px">今日：
          <?php
          //读取
          $mysql_server_name='138.68.41.21';
          $mysql_username='root';
          $mysql_password='1248163264128';
          $mysql_database='visited_ip';
          $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
          mysql_query("set names 'utf8'");
          mysql_select_db($mysql_database);

          //查找此ip是否访问
          $sqlnum = "select * from lneta_ip_info where to_days(time) = to_days(now())";
          $ipdb = mysql_query($sqlnum);
          $ipnum = mysql_num_rows($ipdb);
          echo $ipnum;
          ?>
        </p>
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="js/mytable.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/mobile.js"></script>
    <script src="js/sticky.js"></script>
    <script src="js/lneta.js"></script>
    <script>
      $(document).ready(function() {
        lnetaList.init();
      });
    </script>

</body>

</html>