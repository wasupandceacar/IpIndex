<?php
function my_dir($dir) {
    $files = array();
    if(@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
        while(($file = readdir($handle)) !== false) {
            if($file != ".." && $file != ".") { //排除根目录；
                if(is_dir($dir."/".$file)) { //如果是子文件夹，就进行递归
                    $files[$file] = my_dir($dir."/".$file);
                } else { //不然就将文件的名字存入数组；
                    $files[] = $file;
                }

            }
        }
        closedir($handle);
        return $files;
    }
}
header("content-type:text/html;charset=utf-8");
$pass=$_GET['pass'];
if($pass=="b347342e7b6295d4b5c96889c3d0dd23"){
    $rpys=my_dir("./php/rep");
    foreach ($rpys as $rpy) {
        echo "<a href='http://www.cirno.com.cn/represult.php?rep=".$rpy."'>".$rpy."</a></br>";
    }
}else{
    echo "你没有权限，请和网站建立者PY以获得权限。";
    header("Refresh:3;url=allrep.html");
    exit;
}
