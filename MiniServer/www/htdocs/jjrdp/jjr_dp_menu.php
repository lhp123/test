<?php 
$m_jjrid=filterParaAll($jjrid);
$yewu = filterParaAllByName("type");
?>
      <div id="fyjs_tit">
        <ul>
          <li class="<?php echo $posd=="首页"?"fy_tit1":"fy_tit2"?>"><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $m_jjrid?>">店铺首页</a></li>
          <li class="<?php echo $posd=="列表"&&$yewu=="mm"?"fy_tit1":"fy_tit2"?>"><a href="/jjrdp/jjr_fy.php?type=mm&jjrid=<?php echo $m_jjrid?>">二手房</a></li>
          <li class="<?php echo $posd=="列表"&&$yewu=="zl"?"fy_tit1":"fy_tit2"?>"><a href="/jjrdp/jjr_fy.php?type=zl&jjrid=<?php echo $m_jjrid?>">租房</a></li>
        </ul>
      </div>