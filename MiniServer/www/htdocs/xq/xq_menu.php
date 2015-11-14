  <?php 
  $xqid=filterParaAll($xq_id);
  $xqre1=$xq_re1;
  $xqre2=$xq_re2;
  $xqdisname=$xq_disname;
  $xqaddress=$xq_address;
  ?>
  <div id="fysm"> 
  <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;
  <span class="blu"><a href="xq_list.php">小区</a></span>&nbsp;>&nbsp;
  <span class="blu"><a href="xq_list.php?re1=<?php echo $xqre1;?>"><?php echo $xqre1;?></a></span>&nbsp;>&nbsp;
  <span class="blu"><a href="xq_list.php?re1=<?php echo $xqre1;?>&re2=<?php echo $xqre2;?>"><?php echo $xqre2;?></a></span>&nbsp;>&nbsp;
  <span class="blu"><a href="xq_detail.php?id=<?php echo $xqid;?>"><?php echo $xqdisname?></a></span>&nbsp;</div>
  <div id="xqxx_tit">
  	<span style=" font-size:20px; font-weight:bold;"><?php echo $xqdisname?></span> 地址：<span class="blu">[<a href="xq_list.php?re1=<?php echo $xqre1?>"><?php echo $xqre1?></a>&nbsp;<a href="xq_list.php?re1=<?php echo $xqre1?>&re2=<?php echo $xqre2?>"><?php echo $xqre2?></a>]</span> <?php echo $xqaddress;?>
  </div>
<div id="fyjs_tit">
  	<ul>
    	<li  class=" <?php echo $menu=="小区概况"?"fy_tit1 select":"fy_tit2"?>"><a href="xq_detail.php?xqid=<?php echo $xqid;?>">小区概况</a></li>
        <li class=" <?php echo $menu=="二手房"?"fy_tit1 select":"fy_tit2"?>"><a href="xq_fy_list.php?type=mm&xqid=<?php echo $xqid;?>">二手房</a></li>
        <li class="<?php echo $menu=="租房"?"fy_tit1 select":"fy_tit2"?>"><a href="xq_fy_list.php?type=zl&xqid=<?php echo $xqid;?>">租房</a></li>
        <li class="<?php echo $menu=="小区照片"?"fy_tit1 select":"fy_tit2"?>"><a href="<?php echo $menu!="小区概况"?"xq_detail.php?xqid=".$xqid:""?>#photo">小区照片</a></li>
        <li class="<?php echo $menu=="成交价格参考"?"fy_tit1 select":"fy_tit2"?>"><a href="<?php echo $menu!="小区概况"?"xq_detail.php?xqid=".$xqid:""?>#jgzs">成交价格参考</a></li>
        <li class="<?php echo $menu=="小区周边实景"?"fy_tit1 select":"fy_tit2"?>"><a href="xq_zb.php?xqid=<?php echo $xqid;?>">小区周边实景</a></li>
    </ul>
  </div>