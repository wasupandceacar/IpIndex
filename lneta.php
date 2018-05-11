<!DOCTYPE html>
<html lang="en" class="no-js no-svg">
<head>
<script type="text/javascript">
function browserRedirect() {
var sUserAgent= navigator.userAgent.toLowerCase();
var bIsIpad= sUserAgent.match(/ipad/i) == "ipad";
var bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os";
var bIsMidp= sUserAgent.match(/midp/i) == "midp";
var bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
var bIsUc= sUserAgent.match(/ucweb/i) == "ucweb";
var bIsAndroid= sUserAgent.match(/android/i) == "android";
var bIsCE= sUserAgent.match(/windows ce/i) == "windows ce";
var bIsWM= sUserAgent.match(/windows mobile/i) == "windows mobile";
if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
window.location.href= 'oldlneta.php';
} 
}
browserRedirect();
</script>
<link rel="shortcut icon" href="9.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=750">
<meta name="format-detection" content="telephone=no">

<!-- Web Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@2.0.0/dist/css/yakuhanjp.min.css">
<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
<title>lneta新馆</title>
<link rel='stylesheet' id='reset-css-css'  href='css/reset.css' type='text/css' media='all' />
<link rel='stylesheet' id='common-css-css'  href='css/common.css' type='text/css' media='all' />
<link rel='stylesheet' id='story-css-css'  href='css/story.css' type='text/css' media='all' />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://cdn.bootcss.com/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
<link rel="stylesheet" href="css/newlneta.min.css">
<script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
</head>

<body class="archive post-type-archive post-type-archive-story hfeed has-header-image page-two-column colors-light">
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
<div id="bg_can"></div>
<div id="page" class="site">
	<header id="header_sub" role="banner">
		<div class="navigation-top">
            <h1 class="pc" id="top_pic"></h1>
            <div class="pc pickup_news noto_l"><div class="line"><span id="date_span" class="txt"></span><div class="bg"></div></div>
<div onclick="javascript:location='chickenrank.html'" class="line"><span id="neta_span" class="txt"></span><div class="bg"></div></div></div>
			<ul class="hdr_menu">
                <li class=" menu-item menu-item-type-post_type menu-item-object-page hvr_anim"><a href="lneta.php"><p class="ja">统计表格</p><p class="en">table</p></a></li>
  			    <li class=" menu-item menu-item-type-post_type menu-item-object-page hvr_anim"><a href="lnetachart.html"><p class="ja">统计图形</p><p class="en">graph</p></a><div class="line"></div></li>
                <li class=" menu-item menu-item-type-post_type menu-item-object-page hvr_anim"><a href="updatelog.html"><p class="ja">更新日志</p><p class="en">update log</p></a><div class="line"></div></li>			</ul>
		</div><!-- .navigation-top -->
    
		<div class="sns">
            <div class="wrpr">
                <h4 class="poppin_300">LINKS</h4>
                <hr />
                <ul>
                    <li><a href="lnetacheck.php">lneta收录纠错</a></li>
                    <li><a href="donationrank.html">捐赠榜</a></li>
                    <li><a href="alipay.html">捐赠1元</a></li>
                    <li><a href="alipay5.html">捐赠5元</a></li>
                    <li><a href="alipay25.html">捐赠25元</a></li>
                </ul>
            </div>
        </div>
        	</header><!-- #masthead -->
    <div id="menu_btn" class="sp"><a href="#"><span></span><span></span><span></span></a></div>

	<div id="content" class="in-site-content">

<div class="wrap">
	<header class="page-header">
		<div class="title_area">
      <div class="table-responsive" style="width:90%" data-filter-control="true">
        <table class="table" id="lneta-list">
          <colgroup>
            <col style="width:10%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:500px">
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
		</div>
	</header>
	<div id="btn_cat_open" class="open sp btn_category poppin_n">category<p class="point"><img src="http://never-island.com/cms/wp-content/themes/island/images/news_sp/tri.png" width="15" height="13" /></p><a href="#"></a></div>

	<div id="btn_cat_close" class="sp btn_category poppin_n">close<p class="point"><img src="http://never-island.com/cms/wp-content/themes/island/images/news_sp/close.png" width="17" height="18" /></p><a href="#"></a></div>
</div><!-- .wrap -->


	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<hr class="pc" /><hr class="pc" /><hr class="pc" />
		<div class="wrpr">
			<div id="to_top" class="pc"><a href="#top"><div class="icon"><img class="def" src="http://never-island.com/cms/wp-content/themes/island/images/common/to_top.png" alt="page top" width="73" height="70" /><img class="pc hvr" src="http://never-island.com/cms/wp-content/themes/island/images/common/to_top_hvr.png" alt="page top" width="73" height="70" /></div></a></div>
		</div><!-- .wrap -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script type='text/javascript' src='js/jquery.easing.js'></script>
<script type='text/javascript' src='js/pixi.min.js'></script>
<script type='text/javascript' src='js/background.js'></script>
<script type='text/javascript' src='js/common.js'></script>
<script type='text/javascript' src='js/story.js'></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/toastr.min.js"></script>
<script type='text/javascript' src='js/newmytable.js'></script>
<script type='text/javascript' src='js/mobile.js'></script>
<script type='text/javascript' src='js/filter.js'></script>
<script type='text/javascript' src='js/sticky.js'></script>
<script type='text/javascript' src='js/newlneta.js'></script>
    <script type="text/javascript">
      $(document).ready(function(){
        lnetaList.init();
      });
    </script>
          <div id="backimg" style="position: fixed; left: 0; bottom: 0; background-image:url('img/rmafuyo.png'); width:15%; height:27%; z-index:0;">
        <p style="font-size: 12px; position: absolute; left: 20px; top: 17px">总访问：
          <?php
          echo $ipnum;
          ?>
        </p>
        <p style="font-size: 12px; position: absolute; left: 20px; top: 36px">今日：
          <?php
            echo $nowipnum;
          ?>
        </p>
      </div>

</body>
</html>
