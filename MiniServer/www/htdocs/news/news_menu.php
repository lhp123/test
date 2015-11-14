<?php 
$type=filterPara($type);
?>
<div id="nav">
  <div id="nav_main">
  	<ul>
      <li <?php echo $type==""?"class='an'":""?>><a href="news.php">资讯首页</a></li>
      <li <?php echo $type=="行业动态"?"class='an'":""?>><a href="news_list.php?type=行业动态">行业动态</a></li>
      <li <?php echo $type=="连线VIP"?"class='an'":""?>><a href="news_list.php?type=连线VIP">连线VIP</a></li>
      <li <?php echo $type=="楼市研究"?"class='an'":""?>><a href="news_list.php?type=楼市研究">楼市研究</a></li>
      <li <?php echo $type=="买卖宝典"?"class='an'":""?>><a href="news_list.php?type=买卖宝典">买卖宝典</a></li>
      <li <?php echo $type=="业主谈小区"?"class='an'":""?>><a href="news_list.php?type=业主谈小区">业主谈小区</a></li>
      <li <?php echo $type=="交易工具"?"class='an'":""?>><a href="../fuwu/fuwu.php">交易工具</a></li>
    </ul>
  </div>
</div>