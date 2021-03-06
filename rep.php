<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<link rel = "shortcut icon" href="9.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<link rel="stylesheet" type="text/css" href="css/replay.css" media="screen,print" />
	<title>rep馆</title>
</head>
<body>
  <?php
	include 'php/functioncollection.php';
  $yourip=getip();
  $ar=getCity($yourip);
  $country=$ar["country"];
  $region=$ar["region"];
  $city=$ar["city"];
  $isp=$ar["isp"];
  $datetime = new \DateTime;
  $time=$datetime->format('Y-m-d H:i:s');

  //读取
  loginToDB('visited_ip');

  //查找此ip是否访问
  $sqlexist = "select distinct(ip_id) from rep_ip_info where ip_address='$yourip'";
  $ipexist = mysql_query($sqlexist);
  if (!mysql_num_rows($ipexist)) {
      $sqlnum = "select distinct(ip_address) from rep_ip_info";
      $ipdb = mysql_query($sqlnum);
      $ipnum = mysql_num_rows($ipdb);
      $ipid = $ipnum+1;
      //写入数据库
      $sqlwrite = "insert into rep_ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
      mysql_query($sqlwrite);
      mysql_close();
  } else {
      $ipid = mysql_fetch_array($ipexist)['ip_id'];
      //写入数据库
      $sqlwrite = "insert into rep_ip_info (ip_id, ip_address,ip_location,time) values ($ipid,'$yourip','$country$region$city$isp','$time')";
      mysql_query($sqlwrite);
      mysql_close();
  }
	?>

<div class="title">
	<h1><a id="top" name="top">个人rep馆</a></h1>
</div>
<div class="docbody">
<h2>難易度別一覧</h2>

<div class="index">
<ul>
	<li><a href="#L0">Lunatic</a></li>
	<li><a href="#L1">Lunatic Neta</a></li>
	<li><a href="#L2">Extra Double Neta</a></li>
</ul>
</div>
<h3 id="L0">Lunatic</h3>
<table>
	<colgroup>
		<col class="colType" />
		<col class="colDate" />
		<col class="colComment" />
		<col class="colReplay" />
	</colgroup>
	<tr>
    <th>タイプ</th>
		<th>プレイ日付</th>
		<th>コメント</th>
		<th>リプレイ</th>
	</tr>

	<tr>
		<td>风神录初通</td>
		<td>2016/03/02</td>
		<td>异常艰难的第一个L，强肝8小时后通关</td>
		<td>
			<a href="rep/th10_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>红魔乡初通</td>
		<td>2016/05/04</td>
		<td>当时已经看过星神的红避弹攻略，通之前打过一把疮6开，在鼓挂某次疮六后开了一把就碾压式通关了</td>
		<td>
			<a href="rep/th6_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>神灵庙初通</td>
		<td>2016/06/24</td>
		<td>一面推的不算太多，被明月清泉指导一些姿势后，自己规划了一下，一口气打通，虽然抱了几个B</td>
		<td>
			<a href="rep/th13_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>妖妖梦初通</td>
		<td>2016/08/28</td>
		<td>第一次不使用梦机通关。用的机体是咲B，曾经3残进六连抱12B而疮，不过第二次没有重蹈覆辙</td>
		<td>
			<a href="rep/th7_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>绀珠传初通</td>
		<td>2016/09/03</td>
		<td>通之前用过几把苗机，均连续抱B而死。后来兔子一把就通了，虽然也抱了不少，兔子还是合适猴子，苗机对于猴子并不是一个混关好选择</td>
		<td>
			<a href="rep/th15_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>永夜抄6A初通</td>
		<td>2016/10/13</td>
		<td>因为要打NB开全关而先打的一把混关，直播时候打的，没有什么印象，rep好像没存，已经找不到了</td>
		<td>
			<a>无下载</a>
		</td>
	</tr>

  <tr>
		<td>地灵殿初通</td>
		<td>2017/04/26</td>
		<td>闲来无事所打。殿的弹幕并不很会玩，资源也是很紧张，最后通关成绩也不好看，我觉得挺难的</td>
		<td>
			<a href="rep/th11_l.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>辉针城初通</td>
		<td>2017/04/27</td>
		<td>闲来无事所打。因为通之前练过一段时间的NB单关，所以打起来基本没有阻力，扔完B就猴，最后通关也资源碾压了。没能NM小碗很可惜</td>
		<td>
			<a href="rep/th14_l.rpy">下载链接</a>
		</td>
	</tr>

	<tr>
		<td>星莲船初通</td>
		<td>2017/06/03</td>
		<td>闲来无事所打。只打了两把，第一把死超人。虽然我前面练过船的避弹，但是感觉没啥用呢，混关基本发挥不出来。而且得出一个重要的结论就是超人1B炸不死，用了1B必须用第二个B，还不如强扭</td>
		<td>
			<a href="rep/th12_l.rpy">下载链接</a>
		</td>
	</tr>

	<tr>
		<td>天空璋初通</td>
		<td>2017/09/04</td>
		<td>一把通，太简单，资源太多</td>
		<td>
			<a href="rep/th16_l.rpy">下载链接</a>
		</td>
	</tr>

	<tr>
		<td>大战争初通</td>
		<td>2017/09/14</td>
		<td>A-1路线。对于猴子过于不友好的游戏，说的就是这个吧</td>
		<td>
			<a href="rep/th128_l.rpy">下载链接</a>
		</td>
	</tr>

</table>

<div class="pageNavi"><a href="#top">↑Above</a></div>
<h3 id="L1">Lunatic Neta</h3>
<table>
	<colgroup>
		<col class="colType" />
		<col class="colDate" />
		<col class="colComment" />
		<col class="colReplay" />
	</colgroup>
	<tr>
    <th>タイプ</th>
		<th>プレイ日付</th>
		<th>コメント</th>
		<th>リプレイ</th>
	</tr>

  <tr>
		<td>红魔乡LNB</td>
		<td>2016/08/02</td>
		<td>历时65小时。在底力完全不足的情况下强行开坑。先是坚持每天打打了几乎两个月，然后基本放弃了，却在半个月内直播时开一把出了，很大程度上还是靠运气取胜。底力得到了飞速提高，说是对我影响最大的一个坑也不为过。虽然那时的练习效率现在来看十分低下，换种练习方式也许能有更大的提高</td>
		<td>
			<a href="rep/th6_lnb.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>风神录LNB</td>
		<td>2016/09/11</td>
		<td>历时87小时。比红NB先开坑，但是打得太过零散，练习效率可以说是我打过所有neta最低。在红带来的底力提升下，加上很好的运气，理所当然地打完了</td>
		<td>
			<a href="rep/th10_lnb.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>妖妖梦LNB</td>
		<td>2016/10/08</td>
		<td>历时5小时。可以说是我打neta效率的转折点。从此以及以后，我基本都会对难点进行针对练习，如果底力够的情况下，出货速度能够大大提高，后面所有的neta都印证了这一点，除了让我感觉底力吃紧的绀NB，至今没打出来。不过其实这个NB运气也是不错，有几个地方的结界规划都是第一次执行出来</td>
		<td>
			<a href="rep/th7_lnb.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>永夜抄6ALNB</td>
		<td>2016/11/04</td>
		<td>历时10小时。通之前只疮过一把4，第二把全关通关，感觉运气还行，虽然师匠开始脸黑得很，本来我觉得优势很大，结果裸通。总体来说我特别不喜欢永夜抄，色调阴暗，还要打使魔之类，不能很好地发挥高低切</td>
		<td>
			<a href="rep/th8_lnb6a.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>妖妖梦LNBNR</td>
		<td>2017/03/03</td>
		<td>历时8小时。全关疮了两把，第三把通关。扭的非常好的一局，六开都过了，只是在最后时刻太过兴奋掉了链子，不然感觉有机会满残NBNR龙珠了。妖的梦B，在速攻方面和红梦B一样，贴脸的时间能够在很多地方起作用，很有研究的乐趣</td>
		<td>
			<a href="rep/th7_lnbnr.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>神灵庙LNBNT</td>
		<td>2017/03/07</td>
		<td>历时8小时，第一把全关就通，运气极佳。神的弹幕我在研究之前觉得非常难，进行针对研究后才发现难点颇少，很多曾经的难点练个几十次就能够寻找出稳的方法。可以说是十分亲民的猴子作</td>
		<td>
			<a href="rep/th13_lnbnt.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>风神录LNM</td>
		<td>2017/05/03</td>
		<td>历时1小时。为幽诗人活动所打。通之前撞了一把文1非，撞了一把照国，完全是因为生疏了。不过曾经的200+时间已经足够我咸鱼着碾掉这个neta了</td>
		<td>
			<a href="rep/th10_lnm.rpy">下载链接</a>
		</td>
	</tr>

	<tr>
		<td>辉针城LNB</td>
		<td>2017/06/27</td>
		<td>历时10小时。考试周中烦躁所打，各种sabi撞，城的弹幕上手比较困难，特别是正邪这种反人类弹幕，感觉自己以前的避弹经验一无是处，真是痛苦啊。机体也是没有猴子的特性，打起来比较难受</td>
		<td>
			<a href="rep/th14_lnb.rpy">下载链接</a>
		</td>
	</tr>

</table>

<div class="pageNavi"><a href="#top">↑Above</a></div>
<h3 id="L2">Extra Double Neta</h3>
<table>
	<colgroup>
		<col class="colType" />
		<col class="colDate" />
		<col class="colComment" />
		<col class="colReplay" />
	</colgroup>
	<tr>
    <th>タイプ</th>
		<th>プレイ日付</th>
		<th>コメント</th>
		<th>リプレイ</th>
	</tr>

  <tr>
		<td>红魔乡EXNN</td>
		<td>2016/03/08</td>
		<td>猴子生涯的开端。从此开始沉迷于各种NB。从现在来看，似乎运气非常得好，没有任何单卡练习，光靠全关推把，第一次NN见495，就成功了。也许这就是天麻乱打妹的那种，初心者的强运吧（笑）</td>
		<td>
			<a href="rep/th6_exnn.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>风神录EXNN</td>
		<td>2016/03/18</td>
		<td>在红EXNN的兴奋余波下，本以为会很快拿下，却比红肝了更长时间，赤蛙死都没学会，2成收率都没有，最后强行靠刷脸成功，可谓惨烈。也是效率低下的典范了</td>
		<td>
			<a href="rep/th10_exnn.rpy">下载链接</a>
		</td>
	</tr>

  <tr>
		<td>永夜抄EXNNFS</td>
		<td>2016/11/01</td>
		<td>本来是为了提升避弹而去练的八非，在练了700发之后，找到了收率极高的打法，转而去打全关NN。一共就开了24把，其中我八非收了应该超过16把以上，收率达到6成以上，反而虚人之类撞的更多，充分说明八非并不是什么可怕的东西，说它级别高，可能是你练的太少罢了</td>
		<td>
			<a href="rep/th8_exnn.rpy">下载链接</a>
		</td>
	</tr>

</table>

<div class="pageNavi"><a href="#top">↑Above</a></div>

</div>
<div class="footer">
	<address>
		个人rep馆
	</address>
</div>
</body>
</html>
