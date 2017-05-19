<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="shortcut icon" href="9.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <link rel="stylesheet" type="text/css" href="css/ai.css" />
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //回车
      $(document).keyup(function (evnet){
        if (evnet.keyCode == '13') {
          $('#sendbutton').click();
        }
      });
      //0：正常模式，1：学习模式
      var mode=0;
      $('#sendbutton').on('click', function(e) {
        e.stopPropagation();
        var msg=$("#messagebubble").val();
        msg=msg.replace(/(\n)+|(\r\n)+/g, "");
        $("#messagebubble").val("");
        print(1,msg);
        if(mode==0){
          var start = msg.indexOf("-");
          if(start==0){
            var oppration=msg.substring(1,msg.length);
            if(oppration=="t"){
              print(0,"进入学习模式，输入-x退出</br>输入格式：</br>你要说什么;小⑨回答什么（分号为英文）");
              mode=1;
            }else{
              print(0,"无法识别此指令");
            }
          }else{
            chat(msg);
          }
        }else{
          var start = msg.indexOf("-");
          if(start==0){
            var oppration=msg.substring(1,msg.length);
            if(oppration=="x"){
              print(0,"退出学习模式");
              mode=0;
            }else{
              print(0,"无法识别此指令");
            }
          }else{
            msgs=msg.split(";");
            if(msgs.length==2){
              teach(msgs[0],msgs[1]);
            }else{
              print(0,"请输入正确的格式：</br>你要说什么;小⑨回答什么（分号为英文）");
            }
          }
        }
      });
    });
    function chat(msg){
      $.ajax({
        url: "ai/aichat.php",
        type: 'POST',
        data: "message="+msg,
        timeout: 7000,
        error: function () {
          alert("出现错误");
        },
        success: function (data) {
          print(0,data);
        }
      });
    }
    function teach(ask,answer){
      $.ajax({
        url: "ai/aiteach.php",
        type: 'POST',
        data: "ask="+ask+"&answer="+answer,
        timeout: 7000,
        error: function () {
          alert("出现错误");
        },
        success: function (data) {
          print(0,data);
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
    //信息显示
    function print(char, msg){
      var now = new Date();
      if(char==0){
        $("#chatbubble").html($("#chatbubble").html()+"<p class='card'>小⑨ - "+now.format("HH:mm:ss")+"</p>");
      }else{
        $("#chatbubble").html($("#chatbubble").html()+"<p class='card'>无名氏 - "+now.format("HH:mm:ss")+"</p>");
      }
      $("#chatbubble").html($("#chatbubble").html()+"<p class='message'>"+msg+"</p>");
      $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
    }
  </script>
</head>

<body>
  <div class="chatbubble" id="chatbubble"></div>
  <div><textarea class="messagebubble" id="messagebubble" name="message" rows="10" cols="30"></textarea></div>
  <div style="padding-left:542px"><button class="sendbutton" id="sendbutton">发送</button></div>
</body>

</html>
