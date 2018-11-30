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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/repupload.min.css">
    <link rel="stylesheet" href="css/represult.css">
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

    <div id="content" class="in-site-content">

        <div class="wrap">

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse"
                               href="#collapseOne">
                                rep基本信息
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body" id="baseinfo">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="level1_num" data-toggle="collapse"
                               href="#collapseTwo">
                                单帧Level-1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body" id="level1">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="level2_num" data-toggle="collapse"
                               href="#collapseThree">
                                单帧Level-2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body" id="level2">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="level3_num" data-toggle="collapse"
                               href="#collapseFour">
                                单帧Level-3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body" id="level3">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a id="dl" data-toggle="collapse"
                               onclick="downloadcsv();">
                                csv下载
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        get_rep_info();
    });
    function get_rep_info(){
        $.ajax({
            url: "php/represult.php",
            type: 'POST',
            data: {'rpy':"<?php
                echo $_GET['rep'];
                ?>
                "},
            timeout: 7000,
            error: function () {
                toastr.error("发生错误");
            },
            success: function (data) {
                var j=JSON.parse(data)[0];
                if(j.result=="success"){
                    if(j.error_num!=0){
                        $("#baseinfo").html(j.base_info+"存在错误："+j.error);
                    }else{
                        $("#baseinfo").html(j.base_info);
                    }
                    $("#level1_num").html("单帧Level-1（"+j.level1_num+"个）");
                    $("#level1").html(j.level1);
                    $("#level2_num").html("单帧Level-2（"+j.level2_num+"个）");
                    $("#level2").html(j.level2);
                    $("#level3_num").html("单帧Level-3（"+j.level3_num+"个）");
                    $("#level3").html(j.level3);
                }else {
                    toastr.error("载入rep失败，请退回重试");
                }
            }
        });
    }
    function downloadcsv() {
        toastr.info("少女生成csv中。。。");
        $.ajax({
            url: "php/dl.php",
            type: 'POST',
            data: {'rpy':"<?php
                echo $_GET['rep'];
                ?>
                "},
                timeout: 7000,
            error: function () {
            toastr.error("发生错误");
        },
        success: function (data) {
            var j=JSON.parse(data)[0];
            if(j.result=="success"){
                var f = document.createElement("form");
                document.body.appendChild(f);
                var i = document.createElement("input");
                i.type = "hidden";
                f.appendChild(i);
                i.value = "5";
                i.name = "csv";
                f.action = "php/csv/<?php
                echo substr($_GET['rep'], 0, -4);
                ?>.csv";
                f.submit();
            }else {
                toastr.error("载入rep失败，请退回重试");
            }
        }
    });
    }
</script>

</body>
</html>