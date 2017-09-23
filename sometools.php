<html>
<head>
    <link rel = "shortcut icon" href="9.ico">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css" />

    <title>⑨的工具屋 || <?php
        include 'php/functioncollection.php';
        $tid=(int)$_GET['tid'];
        $name="不存在的";
        $type='无';
        $size='无';
        $info='无';
        $url='无';
        //读取
        loginToDB('tools');
        $sqlexist = "select * from tool_info where tid=$tid";
        $toolexist = mysql_query($sqlexist);
        if (!mysql_num_rows($toolexist)) {
            echo "？？？";
        }else{
            $tmp=mysql_fetch_array($toolexist);
            $name=$tmp['name'];
            echo $name;
            $type=$tmp['type'];
            $info=$tmp['info'];
            $url=$tmp['url'];
        }
        mysql_close();
        ?></title>

</head>
<body>

<div style="font-size:14px;padding-left:70px;padding-top:30px;padding-bottom:30px;padding-right:70px">

    <div style="font-size:22px;border-bottom:2px solid black;width:700px;padding-bottom:5px">
        <?php
        echo $name;
        ?></div></br></br>

    <div style="font-weight:bold;padding-bottom:5px">类型：</div>
    <?php
        echo $type;
    ?></br></br>

    <div style="font-weight:bold;padding-bottom:5px">大小：</div>
    <?php
    echo getFileSize("tools/".$url);
    ?>
    </br></br>

    <div style="font-weight:bold;padding-bottom:5px">简介：</div>
    <?php
    echo $info;
    ?></br></br>

    <div style="font-weight:bold;padding-bottom:5px">下载：</div>
    <?php
    echo "<a href='tools/".urlencode($url)."'>".$url."</a>";
    ?></br></br>

</div>
</body>
</html>
