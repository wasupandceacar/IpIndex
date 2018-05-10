<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "Error: ".$_FILES["file"]["error"];
}
else{
    $subfix=substr($_FILES["file"]["name"],-4);
    if ($subfix==".rpy"){
        $name=substr($_FILES["file"]["name"],0,-4);
        $time=date("Y_m_d_H_i_s",intval(time()));
        $newname=$name."_".$time.$subfix;
        if (file_exists("rep/".$newname))
        {
            echo $newname." 已存在";
        }
        else
        {
            try
            {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "rep/".$newname);
                echo "成功,".$newname;
            }
            catch(Exception $e)
            {
                echo 'Message: ' .$e->getMessage();
            }
        }
    }else{
        echo "文件格式错误";
    }
}