<?include_once 'getjjrdetail.php';$MENU="jjr";$MPOS="list_detail";$YEWU="mm";$YEWU=(filterParaAllByName("y")==""?$YEWU:filterParaAllByName("y"));$jjrdrs=jjrdetail($conn,$CID,filterParaAllByName("id"));$title=$jjrdrs["USERNAME"];$rname=(filterParaByName("rname")==""?"区域":filterParaByName("rname"));$pname=(filterParaByName("pname")==""?"价格":filterParaByName("pname"));$hname=(filterParaByName("hname")==""?"户型":filterParaByName("hname"));include_once 'head.php'; include_once 'picys/ImageCompressUse.php';?>  <script type="text/javascript">  	var QY="&rname=<?=$rname.(filterParaByName("re1")!=""?("&re1=".filterParaByName("re1")):(filterParaByName("re3")==""?"&re2=".filterParaByName("re2"):"&re3=".filterParaByName("re3"))) ?>";  	var P="&pname=<?=$pname?>&price=<?=filterParaAllByName("price")?>";  	var H="&hname=<?=$hname?>&h_shi=<?=filterParaNumberByName("h_shi")?>";  	var DATA_URL="getjjrdetail.php?action=jjrfysearch&id=<?=filterParaAllByName("id") ?>&y=<?=$YEWU ?>";	var QYURL="fylist.php?y=<?=$YEWU ?>"+P+H;	var PURL="fylist.php?y=<?=$YEWU ?>"+QY+H;	var HURL="fylist.php?y=<?=$YEWU ?>"+QY+P;  </script>   <script language="javascript" src="js/jquery_mini.js"></script><script language="javascript" src="js/jquery.dimensions.js"></script>  <script language="javascript">	var name = "#floatMenu";	var menuYloc = null;			$(document).ready(function(){			menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))			$(window).scroll(function () { 				offset = menuYloc+$(document).scrollTop()+"px";				$(name).animate({top:offset},{duration:500,queue:false});			});		}); 	 </script>  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">   <div class="L"><div class="list_header_container">      <div id="list_header">       <div class="H">        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$jjrdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>经纪人详细</span>       </div>      </div>     </div>         <div style="float:right; width:60%;">    <div class="jjr_fy_title" style=" background-color:#333; color:#FFF; line-height:40px;"><strong>&nbsp;&nbsp;经纪人推荐房源</strong></div>     <!--list begin-->     <div id="list_pop_box" class="F" style="display: none; color:#FFF; background-color:#333; ">      <div id="list_filter" class="e" style=" background-color:#333; color:#FFF;">       <span id="list_filter_closed" class="e1" data-event="Track_Sale_Filter_Close">收起</span>             </div>     </div>     <div id="pro_list">      <div id="list_size" style="display: none" data-size='10'></div>     </div>	 <div id="likeNo" style="display: none;">    <div class="none"><em></em><span>对不起，没有搜索到符合条件的房源</span></div>    <div class="loveti">猜您喜欢：</div></div><div id="likeFew" style="display: none;">    <div class="loveti">符合您搜索的房源过少，我们猜您也喜欢：</div></div><div id="like_list" style="display: none;" data-size="39913 "></div>     <div id="list_lookmore" class="a1" style="background-color:#333; color:#FFF;">      <div class="a2"></div>     </div>     <div id="list_nodata" class="a3" style="display: none;">      没有找到相关房源！请重新筛选...     </div>     <div id="list_search_nodate" class="a4" style="display: none;">      <i></i>      <div>       没有找到合适的房子      </div>     </div>    </div>                <div class="left_fd2">    <div class="list_header_container">      <div id="list_header">       <div class="H">        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$jjrdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a></span>       </div>                    </div>     </div>      <table width="100%" border="0" cellspacing="0" cellpadding="0">  <tr>    <td height="170" align="center">    <div style="width:80%;">    <div class="jjr_tx" style="float:left; width:100px;"><img src="<?=getCompressPic($jjrdrs["PHOTO"],50,"",$JJRDEFPHOTO)?>" width="100" height="135" /></div>    <div class="32" style="float:left; margin-left:20px; width:60%; margin-top:15px; line-height:25px; text-align:left; font-size:14px; color:#666666;">         <p><span style="font-size:18px; line-height:30px; color:#000; font-weight:bold;"><?= get_utf8($jjrdrs["USERNAME"])?></span><br />              所属部门：<?=get_utf8($jjrdrs["DEPTNAME"])?><br />      服务区域：<?=get_utf8($jjrdrs["RE2"])?></p>    </div>    </div>    </td>    </tr>  <tr><td height="70" align="center"><div class="jjr_detail_dh">  <img src="netimages/jjr_detail_dh.jpg" width="38" height="33"/>  <?=$jjrdrs["TEL"]?>  </div></td>  </tr>  <tr>    <td align="center" valign="top"><div style="width:80%; margin:10px 0; text-align:left; font-size:14px; line-height:25px; color:#666666;"><span style="font-size:18px; line-height:30px; color:#000; font-weight:bold;">擅长业务</span>      <br />熟悉商圈：<?=get_utf8($jjrdrs["FWSQ"])?>      <br />    主攻小区：<?=get_utf8($jjrdrs["ZGXQ"])?><br /> <!--  擅长业务：<?=get_utf8($jjrdrs["ZGXQ"])?>-->    </div></td>  </tr>  <tr>    <td align="center" valign="top"><div style="width:80%; margin:10px 0; text-align:left; font-size:14px; line-height:25px; color:#666666;"><span style="font-size:18px; line-height:30px; color:#000; font-weight:bold;">个人介绍</span>      <br /><?=get_utf8($jjrdrs["MEMO"])?></div></td>  </tr>     </table></div>               </div>  </div>    <!-- <div id="" class="userpeo" >TEST</div> --><?include_once 'tail2.php'; ?>