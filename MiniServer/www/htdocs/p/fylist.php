<?include_once 'INCLUDE.php'; ?>
<?
$MENU="fy";
$MPOS="list";
$YEWU="mm";
if(filterParaAll($_REQUEST["y"])==""){
	header("location: fylist.php?y=mm");
}
$YEWU=(filterParaAll($_REQUEST["y"])==""?$YEWU:filterParaAll($_REQUEST["y"]));
$rname=(filterPara($_REQUEST["rname"])==""?"区域":filterPara($_REQUEST["rname"]));
$pname=(filterPara($_REQUEST["pname"])==""?"价格":filterPara($_REQUEST["pname"]));
$hname=(filterPara($_REQUEST["hname"])==""?"户型":filterPara($_REQUEST["hname"]));
$mohu=filterParaByName("mohu");
include_once 'head.php'; 
?>
  <script type="text/javascript">
  	var yewu ="<?=filterParaAll($_REQUEST["y"])?>";
  	var QY="&rname=<?=filterPara($_REQUEST["rname"]).(filterPara($_REQUEST["re1"])!=""?("&re1=".filterPara($_REQUEST["re1"])):(filterPara($_REQUEST["re3"])==""?"&re2=".filterPara($_REQUEST["re2"]):"&re3=".filterPara($_REQUEST["re3"]))) ?>";
  	var P="&pname=<?=filterPara($_REQUEST["pname"])?>&price=<?=filterParaAll($_REQUEST["price"])?>";
  	var H="&hname=<?=filterPara($_REQUEST["hname"])?>&h_shi=<?=filterParaNumber($_REQUEST["h_shi"])?>";
	var M = "&mohu=<?=$mohu?>";
	var DISID = "<?=filterParaAllByName("did")!=""?"&did=".filterParaAllByName("did"):""?>"
	
  	var DATA_URL="getfylist.php?action=fysearch&y=<?=$YEWU ?>"+DISID;
	var QYURL="fylist.php?y=<?=$YEWU ?>"+P+H+M+DISID;
	var PURL="fylist.php?y=<?=$YEWU ?>"+QY+H+M+DISID;
	var HURL="fylist.php?y=<?=$YEWU ?>"+QY+P+M+DISID;
  </script> 
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
  
   <div class="L"><div class="H">
        <span id="list_title" class="title">房源列表</span>
        
       </div>
       

     

 	<?include_once 'menu.php'?>
	<script>
      	document.getElementById("sbut").onclick=function (){
	  		//alert(document.getElementById("list_search").value);
			var Qurl="fylist.php?y=<?=$YEWU ?>"+QY+P+H+DISID+"&mohu="+document.getElementById("mohu").value;
			window.location.href = Qurl;
		}
     </script>
    <div class="ipad_right">
     <div class="list_header_container">
      <div id="list_header">
       <div class="s">
        <a id="list_area" href="javascript:void(0);" data-event="Track_Sale_Filter_Area"> <span class="areaid" data-filter=""> <?=$rname?> </span> </a>
        <a href="javascript:void(0);" id="list_keyword" style="display: none"> <span> <?=$rname?> </span> </a>
        <span class="s1"></span>
        <a id="list_price" href="javascript:void(0);" class="e2a e2s" data-event="Track_Sale_Filter_Price"><span class="priceid"><?=$pname?></span>
        </a>
        <span class="s1"></span>
        <a id="list_housetype" href="javascript:void(0);" data-event="Track_Sale_Filter_Housetype"><span class="housetypeid"><?=$hname?></span>
        </a>
       </div>
      </div>
     </div>
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

<div id="like_list" style="display: none;" data-size="10">
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