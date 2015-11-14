<?php

$pos="楼盘代理";

$posd="首页";

?>

<?php include_once '../head.php';?>

<?php

include_once '../action/LpAction.php';

$lpAction = new LpAction($conn,$CID);

?>



<div id="center">

  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="#">楼盘代理</a></span></div>

  <div id="jjr_list">

	<div id="TabbedPanels_lp" class="TabbedPanels_lp">

	  <ul class="TabbedPanelsTabGroup_lp">

	    <li class="TabbedPanelsTab_lp TabbedPanelsTabSelected_lp" tabindex="0">最新楼盘推荐</li>

	    <li class="TabbedPanelsTab_lp" tabindex="0">热门楼盘推荐</li>

      </ul>

      <span class="more" style="float:right;line-height: 30px;"><a href="lpdl_list.php">更多&gt;&gt;</a></span>

	  <div class="TabbedPanelsContentGroup_lp">

          <?php

            $result = $lpAction->getLpWithType("1",6);

            $rs = mysql_fetch_array($result["result"]);

            //$rs = $rs[0];

          ?>

	    <div class="TabbedPanelsContent_lp" style="display: block;">

        <div style="overflow:hidden; margin-bottom:10px;">

        	<div class="left lpdl_new_img">

                <a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

                    <img alt="" src="<?php  echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_B); ?>" width="310px">

                </a>

            </div>

            <div class="left">

            	<table width="100%" border="0" cellpadding="0" cellspacing="10">

                	<tr>

                        <td width="150" class="tit_tex"><?php echo $rs["LPNAME"]; ?>

                            </td>

                    </tr>

                    <tr>

                    	<td><strong>均价：<span style="color:#C00; font-size:14px;"><?php echo $rs["JUNJIA"]; ?>元</span>/平米</strong></td>

                    </tr>

                    <tr>

                    	<td>商圈：<?php echo $rs["SQ"]; ?></td>

                        <td>建筑类型：<?php echo $rs["JZLX"]; ?></td>

                    </tr>

                   

                    <tr>

                    	<td>建筑年代：<?php echo $rs["DZND"]; ?></td>

                        <td>容积率：<?php echo $rs["RJL"]; ?></td>

                    </tr>

                    <tr>

                    	<td>绿化率：<?php echo $rs["LH"]; ?></td>

                        <td>总户数：<?php echo $rs["ZHS"]==""?"":$rs["ZHS"]."户"; ?></td>

                    </tr>

                    <tr>

                    	<td>车位信息：<?php echo $rs["CWXX"]; ?></td>

                        <td></td>

                    </tr>

                </table>

            </div>

            </div>

           <div>

               <?php

               while($rs = mysql_fetch_array($result["result"])){

                   ?>



           <div id="new_box1">

           	 <div class="lpdl_new_box">

                 <a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

                     <img alt="" src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_L); ?>" width="133px" height="102px" />

                </a>

             </div><br />

           	<span class="blu"> <a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>"><?php echo $rs["LPNAME"]; ?></a></span>

           </div>

           <?php };?>



           

           </div> 

        </div>

	    <div class="TabbedPanelsContent_lp" style="display: none;">

            <?php

            $result = $lpAction->getLpWithType("2",6);

            $rs = mysql_fetch_array($result["result"]);

            //$rs = $rs[0];

            ?>

        <div style="overflow:hidden; margin-bottom:10px;">

        	<div class="left lpdl_new_img">

        	<a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

            	<img alt="" src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_B); ?>" width="310px">

            </a>

            </div>

            <div class="left">

            	<table width="100%" border="0" cellpadding="0" cellspacing="10">

                    <tr>

                        <td width="150" class="tit_tex"><?php echo $rs["LPNAME"]; ?>

                        </td>

                    </tr>

                    <tr>

                        <td><strong>均价：<span style="color:#C00; font-size:14px;"><?php echo $rs["JUNJIA"]; ?>元</span>/平米</strong></td>

                    </tr>

                    <tr>

                        <td>商圈：<?php echo $rs["SQ"]; ?></td>

                        <td>建筑类型：<?php echo $rs["JZLX"]; ?></td>

                    </tr>



                    <tr>

                        <td>建筑年代：<?php echo $rs["DZND"]; ?></td>

                        <td>容积率：<?php echo $rs["RJL"]; ?></td>

                    </tr>

                    <tr>

                        <td>绿化率：<?php echo $rs["LH"]; ?></td>

                        <td>总户数：<?php echo $rs["ZHS"]==""?"":$rs["ZHS"]."户"; ?></td>

                    </tr>

                    <tr>

                        <td>车位信息：<?php echo $rs["CWXX"]; ?></td>

                        <td></td>

                    </tr>

                </table>

            </div>

            </div>

           <div>

               <?php

                while($rs = mysql_fetch_array($result["result"])){

               ?>

                    <div id="new_box1">

                        <div class="lpdl_new_box">

                            <a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

                                <img alt="" src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_L); ?>" width="133px" height="102px" />

                            </a>

                        </div><br />

                        <span class="blu"> <a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>"><?php echo $rs["LPNAME"]; ?></a></span>

                    </div>

           	<?php } ?>



           </div> 

        </div>

      </div>

    </div>

    <div id="rtlp">

    	<div id="fyjs_xsfy_tit">

      <div id="fyjs_xsfy_tit_txt">热推楼盘</div>

      <span class="more" style="float:right;"><a href="lpdl_list.php?ifrt=1" >更多>></a></span>

    </div>

      <div id="rtlp_main">

      <?php 

       $result = $lpAction->getLpWithType("3",3);

       while ($rs = mysql_fetch_array($result["result"])){

       	

      ?>

      	<div class="rtlp_box">

       	  <div class="rtlp_box_img">

       	  	<a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

       	  		<img alt="" width="215px" height="170px" src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_B);?>"/>

       	 	</a>

       	  </div>

          <div>

          		<span class="tit_tex"><?php echo $rs["LPNAME"];?></span><br />

				主推户型&nbsp;<?php echo $rs["ZTHX"];?> 建筑面积： <?php echo $rs["JZMJ"]!=""?$rs["JZMJ"]."㎡":"";?><br />

				参考均价：<span class="org"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/㎡":"" ;?></span></div>

        </div>

<?php  } ?>

        

      </div>

    </div>

    <div id="rtlp">

    	<div id="fyjs_xsfy_tit">

      <div id="fyjs_xsfy_tit_txt">促销楼盘</div>

      <span class="more" style="float:right;"><a href="lpdl_list.php?ifcx=1" >更多>></a></span>

    </div>

      <div id="rtlp_main">

      <?php 

       $result = $lpAction->getLpWithType("4",3);

       while ($rs = mysql_fetch_array($result["result"])){

       	

      ?>

      	<div class="rtlp_box">

       	  <div class="rtlp_box_img">

	       	  	<a href="lpdl_detail.php?lpid=<?php echo $rs["ID"]?>">

	       	  		<img alt="" width="215px" height="170px" src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_B);?>"/>

	          	</a>

          </div>

          <div>

          		<span class="tit_tex"><?php echo $rs["LPNAME"];?></span><br />

				主推户型&nbsp;<?php echo $rs["ZTHX"];?> 建筑面积： <?php echo $rs["JZMJ"]!=""?$rs["JZMJ"]."㎡":"";?><br />

				参考均价：<span class="org"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/㎡":"" ;?></span></div>

        </div>

<?php  } ?>

      

     

      </div>

    </div>

  </div>

  <div class="left" id="news_right">

  <div id="zjjjr">

  	<div id="zjjjr_tit" style="background:#FFF; border-bottom:none;"><span class="left" style="margin-left:5px; color:#f7ab00;">房产资讯项目</span></div>

    <div id="zjjjr_main1">

    <span class="new_tit">为您提供<span class="blu2">买房</span><span class="org2">卖房</span>交易服务</span>

    	<ul>

       	  <li>

          <img src="/images/ico_1.jpg" width="18" height="19" /><a href="#">二手房买卖</a> </li>

          <li>

             <img src="/images/ico_2.jpg" width="17" height="18" /><a href="#">房屋租赁</a>

       	  </li>

          <li>

             <img src="/images/ico_3.jpg" width="17" height="18" /><a href="#">房屋托管</a>

       	  </li>

           <li>

             <img src="/images/ico_4.jpg" width="17" height="18" /><a href="#">权属过户</a>

       	  </li>

           <li>

             <img src="/images/ico_5.jpg" width="17" height="18" /><a href="#">金融贷款</a>

       	  </li>

           <li>

             <img src="/images/ico_6.jpg" width="17" height="18" /><a href="#">金融产品</a>

       	  </li>

        </ul>

    </div>

  </div>

  <div id="zjjjr">

  	<div id="zjjjr_tit"><span style="margin-left:5px;">精品楼盘推荐</span></div>

    <div id="zjjjr_main">

    	<ul>

            <?php

             $result = $lpAction->getLpWithType("5",10);

            while($rs = mysql_fetch_array($result["result"])){

            ?>

       	  <li>

            	<div class="left">

                    <a href="lpdl_detail.php?lpid=<? echo $rs["ID"]?>" >

                    <img src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["HXT"], ZW_FY_L); ?>" width="86" height="66" /></a>

                </div>

              <div class="left" style="line-height:20px; margin-left:10px;">

              	<a href="lpdl_detail.php?lpid=<? echo $rs["ID"]?>"><?php echo $rs["TITLE"]; ?></a><br />

                  [主推]<span class="org1"><?php echo $rs["ZTHX"]; ?></span> <br />

                  [均价] <span class="org1"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/㎡":"";?></span><br />

           	  </div>

       	  </li>

               <?php } ?>

         

        </ul>

    </div>

  </div>

  <div id="zjjjr1">

  	<div id="zjjjr_tit" style="background:#FFF; border-bottom:none;"><span class="left" style="margin-left:5px; color:#f7ab00;">热销楼盘排行</span><!--<span style="margin-right:10px;" class="right blu"><a href="#">更多</a></span>--></div>

    <div id="zjjjr_main2">

    	<ul>

    	<?php 

    	    $result = $lpAction->getLpWithType("6",10);

    	    while($rs = mysql_fetch_array($result["result"])){



    	?>

       	  <li>

          <a href="lpdl_detail.php?lpid=<? echo $rs["ID"]?>"><span class="blu left" ><?php echo $rs["RE2"].$rs["LPNAME"]?></span><span class="org1 right"><?php echo $rs["JUNJIA"]!=""?$rs["JUNJIA"]."元/㎡":"";?></span></a> </li>

         

         <?php }?>

        </ul>

    </div>

  </div>

  </div>

    <script type="text/javascript">

$(function(){

	changeTab("TabbedPanels_lp","TabbedPanelsTabSelected_lp");

});



</script>

</div>

<?php include_once '../tail.php';?>