   <?   
   $yw=$MENU=="fy"?$YEWU:$MENU;
   $yw=$yw==""?"mm":$yw;
   ?>
   <div class="ipad_left">
   <div class="left_fd">
    <div class="ipad_left_menu">
    <div class="zcgg"></div>
      <ul>
        <A href="fylist.php?y=mm"><li class="ipad_left_menu<?=$yw=="mm"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad1.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad1.png',sizingMethod='image'); " /> <div class="menu_name">二手房</div></div></li></A>
        <A href="fylist.php?y=zl"><li class="ipad_left_menu<?=$yw=="zl"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad2.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad2.png',sizingMethod='image'); " /> <div class="menu_name">租房</div></div></li></A>
        <A href="xqlist.php"><li class="ipad_left_menu<?=$yw=="xq"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad3.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad3.png',sizingMethod='image'); " /> <div class="menu_name">小区</div></div></li></A>
        <A href="xflist.php"><li class="ipad_left_menu<?=$yw=="xf"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad4.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad4.png',sizingMethod='image'); " /> <div class="menu_name">新房</div></div></li></A>
        <A href="jjrlist.php"><li class="ipad_left_menu<?=$yw=="jjr"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad5.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad5.png',sizingMethod='image'); " /> <div class="menu_name">经纪人</div></div></li></A>
        <A href="weituo.php"><li class="ipad_left_menu<?=$yw=="wt"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad6.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad6.png',sizingMethod='image'); " /> <div class="menu_name">委托</div></div></li></A>
        <A href="about.php"><li class="ipad_left_menu<?=$yw=="gy"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad7.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad7.png',sizingMethod='image'); " /> <div class="menu_name">关于</div></div></li></A>
        <A href="ditu.php"><li class="ipad_left_menu<?=$yw=="dt"?"1":"2"?>"><div class="menu_tb"><img src="netimages/ipad8.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad8.png',sizingMethod='image'); " /> <div class="menu_name">地图</div></div></li></A>
<!--       <li><input type="text" name="textfield3" style="width:55%; float:left; margin-top:10px; margin-left:20px; height:22px; border:1px solid #ccc;"><input name="button" type="submit" class="search" id="button" value="查询"  style="width:25%; float:left; margin-top:10px; margin-left:10px; background-color:#28a2a7; border:0; height:25px; color:#FFF;"/></li>-->
       <?php if($yw!="wt"&&$yw!="gy"&&$yw!="dt"){?>
       <li><input type="text" id = "mohu" name="mohu" value="<?=filterParaByName("mohu")?>" style="width:90%; float:left; margin-top:10px; margin-left:5px; height:32px; border:1px solid #000; border-radius:20px; padding:5px 10px 5px 10px;font-size:1em;" placeholder="请搜索关键字"
	   ><input name="sbut" type="button" class="search" id="sbut" value="查询"  style="width:85%; float:center; margin-top:10px; background-color:#28a2a7; border:1px solid #28a2a7;border-radius:5px; height:35px; color:#FFF; font-size:1em; "/>
	    <br/><a href="fylist.php?y=mm&rname=&re2=&pname=&price=&hname=&h_shi=&mohu=莱茵"style="margin:10px 10px 10px 10px;">莱茵</a><a href="fylist.php?y=mm&rname=&re2=&pname=&price=&hname=&h_shi=&mohu=学区房" style="margin:10px 10px 10px 10px;">学区房</a>
		<a href="fylist.php?y=mm&rname=&re2=&pname=&price=&hname=&h_shi=&mohu=电梯" style="margin:10px 10px 10px 10px;">电梯</a></li>
	  
     	<?php }?>
      </ul>
      </div>
    </div>
   </div>
