  <!-- index 主体 开始 -->

<?php 

include_once PATH_WEBROOT.'action/FyAction.php';

include_once PATH_WEBROOT.'action/XqAction.php';

include_once PATH_WEBROOT.'action/CjAction.php';

include_once PATH_WEBROOT.'action/NewsAction.php';

include_once PATH_WEBROOT.'action/PhotoAction.php';

$fyAction=new FyAction($conn, $CID);

$xqAction=new XqAction($conn, $CID);

$cjAction=new CjAction($conn, $CID);

$newsAction=new NewsAction($conn, $CID);

$photoAction=new PhotoAction($conn, $CID);

?>

  <div id="main">

    <div id="center_main">

      <div id="center_main_tj">

        <div id="center_main_tj_cj">

          <div class="left"> <img src="images/cj_ico.png" width="45" height="37" /></div>

          <div class="left" style="line-height:38px; font-size:16px; color:#535353; font-family:'微软雅黑';"> 最新成交: </div>

          <div class="left" style="line-height:38px; font-size:14px; color:#838383; font-family:'微软雅黑'; margin-left:20px;">

            <div id="scrollDiv">

              <ul>

              <?php 

              $result=$cjAction->getCj(10);

              while($rscj=mysql_fetch_array($result["result"])){

              ?>

                <li>

                  <div class="left" style="height:38px;line-height:38px"><?php echo $rscj["FK_DISNAME"].$rscj["FMDATE"].$rscj["TYPE"]."房源1套，成交价".numberFormatBySelf($rscj["CJ_PRICE"]/10000)."万。"?></div>

                  <div class="left margin_div"><img src="images/new.png" width="32" height="18" /></div>

                </li>

                <?php }?>

              </ul>

            </div>

          </div>

        </div>

        <div id="center_main_tj_title"> <span class="title_b">推荐小区&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="/xq/xq_list.php?iftj=1" target="_blank">查看更多>></a></span> </div>

        <div id="center_main_tj_main">

          <DIV id=featureContainer>

            <DIV id=feature>

              <DIV id=block>

                <DIV id=botton-scroll>

                  <UL class=featureUL>

					<?php 

					$result=$xqAction->getTjXq(6,"",false);

					while($rs=mysql_fetch_array($result["result"])){

					?>

                    <LI class=featureBox>

                      <DIV class=box>

                        <div class="tj_img"> <A href="/xq/xq_detail.php?xqid=<?php echo $rs["ID"]?>" target="_blank"><img src="<?php echo getPicWithFirst($rs["SJT"], $rs["BWT"], ZW_FY_L)?>" width="240" height="182" /></A> </div>

                        <div style="position:relative; left: 1px; top: -57px; width:228px; height:56px; background:url(images/img_bgb.png); color:#FFF; line-height:26px; padding-left:10px;"> 

                        <strong style="font-size:14px;"><?php echo $rs["NAME"]?></strong> <span><strong class="org"><?php echo numberFormatBySelf($rs["JUNJIA"])?></strong></span>元/平米<br /> <?php echo $rs["TITLE"]?>

                        </div>

                        <div class="tj_ico">

                          <table width="100%" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td><img src="/images/tj_ico.png" width="15" height="13" />&nbsp;二手房：<a href="/mmfy_list.php?xqid=<?php echo $rs["ID"]?>" target="_blank"><?php echo $fyAction->getFyCountByDis($rs["ID"],"出售")?>套</a></td>

                              <td><img src="/images/tj_ico.png" width="15" height="13" />&nbsp;出租房：<a href="/zlfy_list.php?xqid=<?php echo $rs["ID"]?>" target="_blank"><?php echo $fyAction->getFyCountByDis($rs["ID"],"出租")?>套</a></td>

                            </tr>

                          </table>

                        </div>

                      </DIV>

                      <!-- /box --></LI>

                      <?php }?>

                  </UL>

                </DIV>

                <!-- /botton-scroll --></DIV>

              <!-- /block --><A class=prev href="javascript:void();">Previous</A><A class=next href="javascript:void();">Next</A></DIV>

            <!-- /feature --></DIV>

        </div>

      </div>

      <div id="ad1"><?php $photo=$photoAction->showPhotoImage("首页广告位1",true); echo $photo["photohtml"];?></div>

      <div id="box1">

        <div class="box2">

          <div class="tit_box"><span class="title_c">新上独家房&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="mmfy_list.php?ifdj=1" target="_blank">查看更多>></a></span></div>

          <div>          

            <ul class="list" id="demo">

            <?php 

            $result=$fyAction->getDjNewFyForIndex(6);

            while($rs=mysql_fetch_array($result["result"])){

				$str=$rs["RE1"]."-".$rs["DISNAME"]." ".$rs["H_SHI"]."室 ".numberFormatBySelf($rs["BUILD_AREA"])."平米 ".numberFormatBySelf($rs["PRICE"])."万";

            ?>

              <li>

                <h2 title="<?php echo $str;?>"><a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><?php echo cut_str($rs["RE1"],2,false)?>-<?php echo cut_str($rs["DISNAME"],6)?>&nbsp;<?php echo $rs["H_SHI"]?>室&nbsp;<?php echo number_format($rs["BUILD_AREA"],0)?>平米&nbsp;<strong class="org"><?php echo number_format($rs["PRICE"],0)?></strong>万</a></h2>

                <div> 

                <?php 

                $photos=getPicsWithAll($rs["PHOTO"], $rs["FXT"]);

                for($i=0;$i<3;$i++){

					if($i==0){

                ?>

                <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><img class="l" src="<?php echo $photos[$i]==""?ZW_FY_L:$photos[$i]?>" alt="<?php echo $rs["TITLE"]?>" /></a>

                <?php }else{?>

                <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><img class="r" src="<?php echo $photos[$i]==""?ZW_FY_L:$photos[$i]?>" alt="<?php echo $rs["TITLE"]?>"/></a>

                <?php }}?>                

                </div>

              </li>

              <?php }?>

            </ul>

          </div>

        </div>

        <script type="text/javascript">sh(document.getElementById("demo"));</script>

        <div class="box2">

          <div class="tit_box"><span class="title_c">优质二手房&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="mmfy_list.php?ifyz=1" target="_blank">查看更多>></a></span></div>

          <div>

            <ul class="list" id="demo1">

            <?php 

            $result=$fyAction->getYzFyForIndex(6);

            while($rs=mysql_fetch_array($result["result"])){

				$str=$rs["RE1"]."-".$rs["DISNAME"]." ".$rs["H_SHI"]."室 ".numberFormatBySelf($rs["BUILD_AREA"])."平米 ".numberFormatBySelf($rs["PRICE"])."万";

            ?>            

              <li>

                <h2 title="<?php echo $str;?>"><a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><?php echo cut_str($rs["RE1"],2,false)?>-<?php echo cut_str($rs["DISNAME"],6)?>&nbsp;<?php echo $rs["H_SHI"]?>室&nbsp;<?php echo number_format ($rs["BUILD_AREA"],0)?>平米&nbsp;<strong class="org"><?php echo number_format($rs["PRICE"],0)?></strong>万</a></h2>

                <div> 

                <?php 

                $photos=getPicsWithAll($rs["PHOTO"], $rs["FXT"]);

                for($i=0;$i<3;$i++){

					if($i==0){

                ?>

                <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><img class="l" src="<?php echo $photos[$i]?>" alt="<?php echo $rs["TITLE"]?>" /></a>

                <?php }else{?>

                <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><img class="r" src="<?php echo $photos[$i]?>" alt="<?php echo $rs["TITLE"]?>"/></a>

                <?php }}?>                

                </div>            

              </li>

              <?php }?>

            </ul>

          </div>

        </div>

        <script type="text/javascript">sh(document.getElementById("demo1"));</script>

        <div class="box2" style="margin-right:0px;">

          <div class="tit_box"><span class="title_d">大家都关注的话题&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="/news/news.php" target="_blank">查看更多>></a></span></div>

          <div style="height:188px;"> 

          	<div class="zxzx">

            <ul>

            <?php 

            $result=$newsAction->getGuanzhuNews(6);

            while($rsnews=mysql_fetch_array($result["result"])){

            ?>

              <li><a href="/news/news_detail.php?id=<?php echo $rsnews["ID"]?>" target="_blank"><?php echo $rsnews["TITLE"]?></a></li>

              <?php }?>

            </ul>

          </div>

           

          </div>

          <div class="tit_box"><span class="title_e">最新资讯&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="/news/news.php" target="_blank">查看更多>></a></span></div>

          <div class="zxzx">

            <ul>

            <?php 

            $result=$newsAction->getXingquNews(4);

            while($rsnews=mysql_fetch_array($result["result"])){

            ?>

              <li><a href="/news/news_detail.php?id=<?php echo $rsnews["ID"]?>" target="_blank"><?php echo $rsnews["TITLE"]?></a></li>

              <?php }?>

            </ul>

          </div>

        </div>

      </div>

      <div id="ad2" padding="padding-top:15px"><?php $photo=$photoAction->showPhotoImage("首页广告位2",true); echo $photo["photohtml"];?></div>

      <div id="box1">

        <div class="box2">

          <div class="tit_box"><span class="title_c">热门二手房&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="mmfy_list.php?iftj=1" target="_blank">查看更多>></a></span></div>

          <div class="rmdt">

            <?php 

            $result=$fyAction->getFyForIndex(10,"出售");

            while($rs=mysql_fetch_array($result["result"])){

				$str=$rs["RE1"]."-".$rs["DISNAME"]." ".$rs["H_SHI"]."室 ".numberFormatBySelf($rs["PRICE"])."万".numberFormatBySelf($rs["BUILD_AREA"])."平米 ";

            ?> 

            <ul title="<?php echo $str;?>">

              <li class="one"> <a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank">[<?php echo cut_str($rs["RE1"],2,false)?>]</a> </li>

              <li class="two"><a href="mmfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><?php echo $rs["DISNAME"]?></a></li>

              <li class="five"><?php echo numberFormatBySelf($rs["PRICE"])?>万</li>

              <li class="four"><?php echo numberFormatBySelf($rs["BUILD_AREA"])?>平米</li>

            </ul>

            <?php }?>

          </div>

        </div>

        <div class="box2">

          <div class="tit_box"><span class="title_c">热门租房&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="zlfy_list.php?iftj=1" target="_blank">查看更多>></a></span></div>

          <div class="rmdt">

            <?php 

            $result=$fyAction->getFyForIndex(10,"出租");

            while($rs=mysql_fetch_array($result["result"])){

				$str=$rs["RE1"]."-".$rs["DISNAME"].$rs["DIRECTION"]." ".numberFormatBySelf($rs["PRICE"])."元".$rs["H_SHI"]."室".$rs["H_TING"]."厅";

            ?> 

            <ul title="<?php echo $str;?>">

              <li class="one"> <a href="zlfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank">[<?php echo cut_str($rs["RE1"],2,false)?>]</a> </li>

              <li class="two"><a href="zlfy_detail.php?id=<?php echo $rs["ID"]?>" target="_blank"><?php echo $rs["DISNAME"].$rs["DIRECTION"]?></a></li>

              <li class="five"><?php echo numberFormatBySelf($rs["PRICE"])?>元</li>

              <li class="four"><?php echo $rs["H_SHI"]?>室<?php echo $rs["H_TING"]?>厅</li>

            </ul>

            <?php }?>

          </div>

        </div>

        <div class="box2" style="margin-right:0px;">

          <div class="tit_box"><span class="title_d">购房工具</span><span class="more">&nbsp;</span></div>

          <div class="box3">

            <ul>

              <li>

                <table border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td width="20"><img src="images/tit_ico5.jpg" width="12" height="30" /></td>

                    <td>&nbsp;<a href="/fuwu/fuwu.php" target="_blank">贷款计算器</a></td>

                  </tr>

                </table>

              </li>

              <li>

                <table border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td width="20"><img src="images/tit_ico6.jpg" width="16" height="30" /></td>

                    <td>&nbsp;<a href="/fuwu/fuwu_list.php?subtype=二手房交易流程" target="_blank">二手房交易流程</a></td>

                  </tr>

                </table>

              </li>

              <li>

                <table border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td width="20"><img src="images/tit_ico7.jpg" width="16" height="30" /></td>

                    <td>&nbsp;<a href="/fuwu/fuwu_list.php?subtype=过户流程" target="_blank">过户流程</a></td>

                  </tr>

                </table>

              </li>

              <li>

                <table border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td width="20"><img src="images/tit_ico8.jpg" width="11" height="30" /></td>

                    <td>&nbsp;<a href="/fuwu/fuwu_list.php?subtype=二手房按揭流程" target="_blank">二手房按揭流程</a></td>

                  </tr>

                </table>

              </li>

            </ul>

          </div>

          <div class="tit_box"><span class="title_f">最新房源&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="more"><a href="mmfy_list.php" target="_blank">查看更多>></a></span></div>

          <div class="zxzx">

            <ul>            

            <?php 

            $result=$fyAction->getFyForIndex(7,"");

            while($rs=mysql_fetch_array($result["result"])){

				$str=$rs["RE1"]."-".$rs["DISNAME"]." ".$rs["H_SHI"]."室".$rs["H_TING"]."厅".numberFormatBySelf($rs["PRICE"]).($rs["TYPE"]=="出售"?"万":"元");

            ?> 

              <li><a href="<?php echo $rs["TYPE"]=="出售"?"mmfy_detail.php":"zlfy_detail.php"?>?id=<?php echo $rs["ID"]?>" title="<?php echo $str;?>" target="_blank">

              

              <span style="width:60px; display:block; float:left;">[<?php echo cut_str($rs["RE1"], 2,false)?>]</span>

              <span style="width:120px; display:block; float:left;"><?php  echo cut_str($rs["DISNAME"], 7)?></span>

              <span style="width:65px; display:block; float:left;"><?php echo $rs["H_SHI"]?>室<?php echo $rs["H_TING"]?>厅</span>

			  <span style="width:65px; display:block; float:left;"><?php echo numberFormatBySelf($rs["PRICE"]).($rs["TYPE"]=="出售"?"万":"元")?></span>

              </a>

              

              </li>

            <?php }?>

            </ul>

          </div>

        </div>

      </div>

      <div id="ad2">

      	<div id="ad2_box1">

      		<?php $photo=$photoAction->showPhotoImage("首页广告位3",true); echo $photo["photohtml"];?>

        </div>

        <div id="ad2_box2">

        	<?php $photo=$photoAction->showPhotoImage("首页广告位4",true); echo $photo["photohtml"];?>

        </div>

      </div>

      

  <div id="zsdiv">

        <div class=""><span class="title_c"><?php echo $CITYNAME?>二手房成交走势&nbsp;&nbsp;</span><span class="more"><a href="#" >&nbsp;</a></span></div>

        <div style="margin-top:10px;">

          <div class="left" style="width:523px; overflow:hidden; "> 

          <iframe src="index_pricechart.php" name="index_pricechart" width="526px" height="275px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>

          </div>

          <div class="left" style="width:460px; overflow:hidden; margin-left:20px; padding-top:30px;"> <span style="font-size:18px; color:#f7ab00;"><strong><?php echo $CITYNAME?>二手房最新成交数据：</strong></span><br />

            <br />

            <br />

            <span style="font-size:14px; color:#f7ab00; "><?php echo date("y")?>年<?php echo date("n")?>月份<?php echo $CITYNAME?>二手房成交均价：<strong  class="org"><?php echo $cjAction->getMmCjJunjia_CurMonth();?></strong>元/平米</span><br />

            <br />

            <br />

            <table border="0" cellpadding="0" cellspacing="0">

              <tr>

                <td><span style="font-size:14px; color:#f7ab00; ">相比上月：</span></td>

                <?php 

                	$lastJ = $cjAction->getCjJunjia_LastMonth();

                	$curJ  = $cjAction->getCjJunjia_CurMonth();

                	if($lastJ!=0){

                		$hb = $curJ/$lastJ -1 ;

                		if($hb>0){

				?>

                	 <td><img src="images/tit_ico10.jpg" width="16" height="21" /></td>		

                		          			

                <?php    }else if($hb<0){?>

                		<td><img src="images/tit_ico9.jpg" width="16" height="21" /></td>

                <?php 	}

                	} 

                ?>

                

               

                <td><span class="org"><?php echo round($hb*100,2);?>%</span><br /></td>

              </tr>

            </table>

            <br />

            <br />

            <script type="text/javascript" src="/js/AutocompletePlugin/jquery.autocomplete.min.js"></script>

          

            <link rel="Stylesheet" href="/js/AutocompletePlugin/jquery.autocomplete.css" />

         

            <table border="0" cellpadding="0" cellspacing="0">

              <tr>

                <td height="30" colspan="2"><span style="font-size:14px;">还能查看小区房价，快来试试...</span></td>

              </tr>

              <tr>

                <td><input id="xq_name" type="text" onfocus="if(this.value==this.defaultValue){this.value=''}"  defaultValue="输入小区名称..." value="输入小区名称..." style=" width:280px; height:30px; line-height:30px; padding-left:5px; color:#666;" /></td>

                <td><input id="xq_price_search" value="查房价" type="button" style="height:36px; width:80px; background:#f7ab00; color:#FFF; font-size:14px; font-family:'微软雅黑'; border:#f7ab00 1px solid; border-left:none;" /></td>

              </tr>

            </table>

          </div>

        </div>

      </div>

      

      



      <?php //include_once 'index_pricechart.php';?>

      

      <?php include_once 'wy.php';?>

    </div>

  </div>

  <!-- index 主体 结束 -->

