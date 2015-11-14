<?
include_once 'getjjrlist.php';
$MENU="jjr";
$MPOS="list_detail";
$YEWU="mm";
$YEWU=(filterParaAll("y")==""?$YEWU:filterParaAll("y"));
$jjrdrs=jjrdetail($conn,$CID,filterParaByName("id"));
include_once 'head.php'; 
include_once 'picys/ImageCompressUse.php';

?>
  <script type="text/javascript">
  	var DATA_URL="getjjrlist.php?action=jjrfysearch&y=mm";
	var QYURL="jjrlist.php?y=mm";
  </script> 
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L">
    <div>
     <div class="list_header_container">
      <div id="list_header">

       <div class="H"  id="topbar">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$jjrdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> 
        <span>返回</span> </a>经纪人详细
       </div>
       
       
      </div>
     </div>
     
     <div class="jjr_list2"><ul>
<li>
	<?
	$photo=($jjrdrs["PHOTO"]==""?$JJRDEFPHOTO:$jjrdrs["PHOTO"]);
	?>
    <div class="jjr_list_photo"><img src="<?=getCompressPic($photo)?>" width="50" height="70" /></div>
    <div class="jjr_list_js2">
         <ul>
         <li><span class="black_xhx"><a href="#"><?=p_utf8($jjrdrs["USERNAME"]) ?></a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red"><?=$jjrdrs["TEL"] ?></span></li>
         <li>所属门店：<?=p_utf8($jjrdrs["DEPTNAME"]) ?></li>
         <li>服务商圈：<?=p_utf8($jjrdrs["FWSQ"]) ?>
         <br>待售房源：<?=getJjrFyCount($conn,$CID,$jjrdrs["ID"]) ?>套</li>
         </ul>
    </div>
	<div  style="float:right;"><a href="tel:<?=$jjrdrs["TEL"] ?>"><img src="netimages/tel1.png" style="zoom:0.4"></a></div>
</li>


</ul></div>



<div class="jjr_fy_title"><strong>经纪人推荐房源</strong></div>
     <!--list begin-->
     <div id="list_pop_box" class="F" style="display: none;">   
      <div id="list_filter" class="e">
       <span id="list_filter_closed" class="e1" data-event="Track_Sale_Filter_Close">收起</span>
       <div id="list_screenPop" class="e2">
        <div>
         <!--区域筛选-->
         <div id="list-area-div" class="e2a" data-event="Track_Sale_Filter_Area_Select">
         </div>
         <!--价格筛选-->
         <div id="list-price-div" class="e2a" data-event="Track_Sale_Filter_Price_Select">
         </div>
         <!--户型筛选-->
         <div id="list-housetype-div" class="e2a" data-event="Track_Sale_Filter_Housetype_Select">
         </div>
         <!-- 历史记录 -->
         <div id="list-history-div" class="e2a" data-page="sale">
          <i>搜索历史</i>
         </div>
        </div>
       </div>
      </div>
     </div>
     <div id="pro_list">
      <div id="list_size" style="display: none" data-size='10'></div>

     </div>

	 <div id="likeNo" style="display: none;">
    <div class="none"><em></em><span>对不起，没有搜索到符合条件的房源</span></div>
    <div class="loveti">猜您喜欢：</div>
</div>
<div id="likeFew" style="display: none;">
    <div class="loveti">符合您搜索的房源过少，我们猜您也喜欢：</div>
</div>

<div id="like_list" style="display: none;" data-size="39913 ">
</div>

     <div id="list_lookmore" class="a1">
      <div class="a2"></div>
     </div>
     <div id="list_nodata" class="a3" style="display: none;">
      没有找到相关房源！请重新筛选...
     </div>
     <div id="list_search_nodate" class="a4" style="display: none;">
      <i></i>
      <div>
       没有找到合适的房子
      </div>
     </div>
    </div>
   </div>
  </div>
  
  
<!-- 
<div id="" class="userpeo" >TEST</div>
 -->

<?include_once 'tail2.php'; ?>