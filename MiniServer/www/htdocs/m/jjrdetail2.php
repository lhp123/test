<?include_once 'INCLUDE.php'; ?>
<?
$MPOS="list";
$YEWU="mm";
$YEWU=($_REQUEST["y"]==""?$YEWU:$_REQUEST["y"]);

$rname=($_REQUEST["rname"]==""?"区域":$_REQUEST["rname"]);
$pname=($_REQUEST["pname"]==""?"价格":$_REQUEST["pname"]);
$hname=($_REQUEST["hname"]==""?"户型":$_REQUEST["hname"]);

include_once 'head.php'; 
?>
  <script type="text/javascript">
  	var QY="&rname=<?=$_REQUEST["rname"].($_REQUEST["re1"]!=""?("&re1=".$_REQUEST["re1"]):($_REQUEST["re3"]==""?"&re2=".$_REQUEST["re2"]:"&re3=".$_REQUEST["re3"])) ?>";
  	var P="&pname=<?=$_REQUEST["pname"]?>&price=<?=$_REQUEST["price"]?>";
  	var H="&hname=<?=$_REQUEST["hname"]?>&h_shi=<?=$_REQUEST["h_shi"]?>";
  	var DATA_URL="getfylist.php?action=fysearch&y=<?=$YEWU ?>";
	var QYURL="fylist.php?y=<?=$YEWU ?>"+P+H;
	var PURL="fylist.php?y=<?=$YEWU ?>"+QY+H;
	var HURL="fylist.php?y=<?=$YEWU ?>"+QY+P;
  </script>
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
 <link href="netcss/jjr.css" rel="stylesheet" type="text/css" />
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L">
    <div>
     <div class="list_header_container">
      <div id="list_header">

       <div class="H">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$fydrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>经纪人详细</span>
       </div>
       
       
      </div>
     </div>
     
     <div class="jjr_list2"><ul>
<li>
    <div class="jjr_list_photo"><img src="netimages/photo.jpg" width="50" height="70" /></div>
    <div class="jjr_list_js2">
         <ul>
         <li><span class="black_xhx"><a href="#">刘海龙</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red">18911130578</span></li>
         <li>所属门店：鲁能新城店</li>
         <li>服务商圈：河西&nbsp;&nbsp;汇通大厦</li>
         <li>30天待看：268&nbsp;&nbsp;待售房源：12套</li>
         </ul>
    </div>
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