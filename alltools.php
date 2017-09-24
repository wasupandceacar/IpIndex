<html>
<head>
    <link rel = "shortcut icon" href="9.ico">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css" />

    <title>⑨的工具屋 || 前台<?php
        include 'php/functioncollection.php';
        $allurls="";
        //读取
        loginToDB('tools');
        $id=1;
        while (1) {
            $sqlexist = "select * from tool_info where tid=$id";
            $toolexist = mysql_query($sqlexist);
            if (!mysql_num_rows($toolexist)) {
                break;
            } else {
                $re=mysql_fetch_array($toolexist);
                $allurls=$allurls."<a href='sometools.php?tid=".$id."'>".$re['name']."</a></br>";
                $id+=1;
            }
        }
        mysql_close();
        ?></title>

</head>
<body>

<div style="font-size:14px;padding-left:70px;padding-top:30px;padding-bottom:30px;padding-right:70px">

    <div style="font-size:22px;border-bottom:2px solid black;width:700px;padding-bottom:5px">
        目录index</div></br></br>

    <div style="font-size:16px;font-weight:bold;padding-bottom:5px"></div>
    <?php
    echo $allurls;
    ?></br></br>

</div>
</body>
</html>
