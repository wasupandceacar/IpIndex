<!DOCTYPE html>
<html lang="en" class="no-js no-svg">
<head>
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
    <title>rep分析</title>
    <link rel='stylesheet' id='reset-css-css'  href='css/reset.css' type='text/css' media='all' />
    <link rel='stylesheet' id='common-css-css'  href='css/common.css' type='text/css' media='all' />
    <link rel='stylesheet' id='story-css-css'  href='css/story.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/repupload.min.css">
    <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
    <script type='text/javascript' src='js/jquery-migrate.min.js'></script>
</head>

<body class="archive post-type-archive post-type-archive-story hfeed has-header-image page-two-column colors-light">
<div id="bg_can"></div>
<div id="page" class="site">
    <header id="header_sub" role="banner">
        <div class="navigation-top">
            <h1 class="pc" id="top_pic"></h1>
            <div class="pc pickup_news noto_l"><div class="line"><span id="date_span" class="txt"></span><div class="bg"></div></div>
                <div onclick="javascript:location='chickenrank.html'" class="line"><span id="neta_span" class="txt"></span><div class="bg"></div></div></div>
            <ul class="hdr_menu"></ul>
        </div><!-- .navigation-top -->

        <div class="sns">
            <div class="wrpr">
                <h4 class="poppin_300">LINKS</h4>
                <hr />
                <ul>
                    <li><a href="allrep.html">查看所有rep</a></li>
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
<script src="https://cdn.bootcss.com/toastr.js/latest/toastr.min.js"></script>
<script type='text/javascript' src='js/repupload.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        alert("<?php
        echo $_GET['rep'];
?>
");
    });
</script>

</body>
</html>