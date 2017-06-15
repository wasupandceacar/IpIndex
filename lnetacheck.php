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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
  <link rel="stylesheet" href="css/lnetacheck.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="title">
        <center>
          <h4>请填写你发现的视频信息错误（请注意核对是否填错av号，请勿填写无关内容）</h4></center>
      </div>
      <input id="av" class="form-control col-md-7 col-xs-12" type="number" placeholder="填入需要修改或补漏的视频av号">
      <input id="reason" class="form-control col-md-7 col-xs-12" type="text" placeholder="填入该视频需要改进的理由（如表格中无此视频、视频的作品或neta类型写错等）">
      <button id="send" class="btn btn-default btn-block pull-right">提交</button>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/extensions/export/bootstrap-table-export.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#send').on('click', function(e) {
          e.stopPropagation();
          var str=$('#av').val();
          var avid = parseInt(str);
          var msg=$('#reason').val();
          if(str==""){
            alert("请填写av号！");
          }else if(msg==""){
            alert("请填写理由！");
          }else{
            send(avid,msg);
          }
        });
      });

      function send(avid, msg) {
        $.ajax({
          url: "php/lnetacheck.php",
          type: 'POST',
          data: "avid=" + avid + "&msg=" + msg,
          timeout: 7000,
          error: function() {
            alert("出现错误");
          },
          success: function(data) {
            alert(data);
          }
        });
      }
    </script>

</body>

</html>
