<?php
  $mysql_server_name='138.68.41.21';
  $mysql_username='root';
  $mysql_password='1248163264128';
  $mysql_database='osu';
  $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting") ;
  mysql_query("set names 'utf8'");
  mysql_select_db($mysql_database);
  $sql = "select * from osu_High_pps order by pp desc";
  $result = mysql_query($sql);
  $arr = array();
  $rank = 1;
  while ($row = mysql_fetch_array($result)) {
      $count=count($row);
      for ($i=0;$i<$count;$i++) {
          unset($row[$i]);
      }
      $row['rank'] = $rank;
      $rank+=1;
      $row['user']="<a href='https://osu.ppy.sh/u/".$row['uid']."'>".$row['user']."</a>";
      $row['map_info']="<a href='https://osu.ppy.sh/b/".$row['bid']."'>".$row['map_info']."</a>";
      unset($row['uid']);
      unset($row['bid']);
      array_push($arr, $row);
  }
  $allarr=array(
    'data'=>$arr
  );
  echo json_encode($allarr, JSON_UNESCAPED_UNICODE);
  mysql_close($conn);
