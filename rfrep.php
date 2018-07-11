<?php
function my_dir($dir) {
    $files = array();
    if(@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
        while(($file = readdir($handle)) !== false) {
            if($file != ".." && $file != ".") { //排除根目录；
                if(is_dir($dir."/".$file)) { //如果是子文件夹，就进行递归
                    $files[$file] = my_dir($dir."/".$file);
                } else { //不然就将文件的名字存入数组；
                    $filetime [] = date("Y-m-d H:i:s", filemtime($dir."/".$file));
                    $files[] = $file;
                }

            }
        }
        closedir($handle);
        array_multisort($filetime,SORT_DESC,SORT_STRING, $files);
        return $files;
    }
}
header("content-type:text/html;charset=utf-8");
if(isset($_GET["type"])){
	$type=$_GET["type"];
	if($type=="nn" or $type=="sco" or $type=="spe"){
		$rpys=my_dir("./".$type."rep");
		foreach ($rpys as $rpy) {
    			echo "<a href='http://www.cirno.com.cn/".$type."rep/".$rpy."'>".$rpy."</a></br>";
		}
	}else{
		echo "请选择rep类型：</br>";
		echo "<a href='http://www.cirno.com.cn/rfrep.php?type=nn'>NN(N)rep</a></br>";
		echo "<a href='http://www.cirno.com.cn/rfrep.php?type=sco'>打分rep</a></br>";
		echo "<a href='http://www.cirno.com.cn/rfrep.php?type=spe'>特殊玩法rep</a></br>";
	}			
}else{
	echo "请选择rep类型：</br>";
	echo "<a href='http://www.cirno.com.cn/rfrep.php?type=nn'>NN(N)rep</a></br>";
	echo "<a href='http://www.cirno.com.cn/rfrep.php?type=sco'>打分rep</a></br>";
	echo "<a href='http://www.cirno.com.cn/rfrep.php?type=spe'>特殊玩法rep</a></br>";
}


