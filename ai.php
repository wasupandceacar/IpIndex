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
      //0：正常模式，1：学习模式
      var mode=0;
      $('#sendbutton').on('click', function(e) {
        e.stopPropagation();
        var msg=$("#messagebubble").val();
        $("#messagebubble").val("");
        $("#chatbubble").html($("#chatbubble").html()+msg+"</br>");
        $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
        if(mode==0){
          var start = msg.indexOf("-");
          if(start==0){
            var oppration=msg.substring(1,msg.length);
            if(oppration=="t"){
              $("#chatbubble").html($("#chatbubble").html()+"进入学习模式，输入-x退出"+"</br>");
              $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
              mode=1;
            }else{
              $("#chatbubble").html($("#chatbubble").html()+"无法识别此指令"+"</br>");
              $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
            }
          }else{
            chat(msg);
          }
        }else{
          var start = msg.indexOf("-");
          if(start==0){
            var oppration=msg.substring(1,msg.length);
            if(oppration=="x"){
              $("#chatbubble").html($("#chatbubble").html()+"退出学习模式"+"</br>");
              $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
              mode=0;
            }else{
              $("#chatbubble").html($("#chatbubble").html()+"无法识别此指令"+"</br>");
              $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
            }
          }else{

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
          $("#chatbubble").html($("#chatbubble").html()+data+"</br>");
          $('#chatbubble').scrollTop($('#chatbubble')[0].scrollHeight);
        }
      });
    }
  </script>
</head>

<body>
  <div class="chatbubble" id="chatbubble"></div>
  <div><textarea class="messagebubble" id="messagebubble" name="message" rows="10" cols="30"></textarea></div>
  <div style="padding-left:542px"><button class="sendbutton" id="sendbutton">发送</button></div>
</body>

</html>
