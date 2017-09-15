<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="9.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Lneta馆</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/lneta.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      send();
    });
    function send(){
      $.ajax({
        url: "php/getlog.php",
        type: 'POST',
        timeout: 7000,
        error: function () {
          alert("发生错误");
        },
        success: function (data) {
          $('#log').html(data);
        }
      });
    }
  </script>
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
            <img src="img/logo9.webp" class="img-thumbnail" width="79px">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="coll">
          <ul class="nav navbar-nav">
            <li><a href="lneta.html" target="_self">统计表格</a></li>
            <li><a href="lnetachart.html" target="_self">统计图形</a></li>
            <li class="active"><a href="updatalog.php" target="_self">维护日志</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main_container">
      <div class="title">
        <h2 class="h2title">维护日志</h2>
      </div>
        <h2></h2>
        <div id="log" class="subtitle">
      </div>
    </div>

</body>

</html>
