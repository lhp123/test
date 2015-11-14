<?include_once 'INCLUDE.php'; ?>



<?

$MENU="ditu";

$MPOS="list";

$YEWU="mm";

$YEWU=(filterParaAllByName("y")==""?$YEWU:filterParaAllByName("y"));

$mohu=filterParaByName("mohu");



$rname=(filterParaByName("rname")==""?"区域":filterParaByName("rname"));

$pname=(filterParaByName("pname")==""?"价格":filterParaByName("pname"));

$hname=(filterParaByName("hname")==""?"户型":filterParaByName("hname"));



include_once 'head.php'; 



?>

<style>

.marker {

	width: 45px;

	PADDING-RIGHT: 0px;

	PADDING-LEFT: 0px;

	FONT-SIZE: 12px;

	BACKGROUND-IMAGE: url(netimages/marker.png);

	PADDING-BOTTOM: 0px;

	CURSOR: pointer;

	COLOR: #333;

	LINE-HEIGHT: 45px;

	PADDING-TOP: 0px;

	POSITION: absolute;

	HEIGHT: 62px;

	TEXT-ALIGN: center;

	min-width: 45px

}



.marker_hover {

	Z-INDEX: 1;

	BACKGROUND-IMAGE: url(netimages/marker-h.png)

}



.map2_commname_hover {

	margin-left:20px;

	PADDING-RIGHT: 5px;

	BACKGROUND-POSITION: right 50%;

	PADDING-LEFT: 25px;

	FONT-SIZE: 12px;

	BACKGROUND-COLOR: #0079D6;

	PADDING-BOTTOM: 0px;

	CURSOR: pointer;

	COLOR: #ffffff;

	LINE-HEIGHT: 27px;

	PADDING-TOP: 1px;

	BACKGROUND-REPEAT: no-repeat;

	WHITE-SPACE: nowrap;

}

</style>

  <script type="text/javascript">

  	var QY="&rname=<?=filterParaByName("rname").(filterParaByName("re1")!=""?("&re1=".filterParaByName("re1")):(filterParaByName("re3")==""?"&re2=".filterParaByName("re2"):"&re3=".filterParaByName("re3"))) ?>";

  	var P="&pname=<?=filterParaByName("pname")?>&price=<?=filterParaAllByName("price")?>";

  	var H="&hname=<?=filterParaByName("hname")?>&h_shi=<?=filterParaNumberByName("h_shi")?>";

  	var Y = "<?=$YEWU?>";

  	var yewu ="<?=$YEWU?>";

  	var M = "&mohu=<?=$mohu?>";

  	var DATA_URL ="getditulist.php?action=fysearch&y=<?=$YEWU ?>";

	var QYURL="ditu.php?action=fysearch&y=<?=$YEWU ?>"+P+H+M;

	var PURL="ditu.php?action=fysearch&y=<?=$YEWU ?>"+QY+H+M;

	var HURL="ditu.php?action=fysearch&y=<?=$YEWU ?>"+QY+P+M;

	

 	



  </script> 

  <SCRIPT type=text/javascript charset=utf-8 src="js/api"></SCRIPT>

  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">

  

   <div class="L">

   <div class="ipad_left_dt" style="position: fixed; left:0px; top:0px; z-index:1000; overflow:visible; text-align:center; _position:absolute; _top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); margin:0 auto; clear:both; cursor:pointer;">         

    

    

    <div class="map" id="FYDIV" style="float: left; width: 100%; height: 100%;">地图正在努力加载中......</div>

  	

   </div>

      

    <div class="ipad_right_dt">

     <div class="list_header_container">

      <div id="list_header">

	<div class="s">

		<a id="list_area" href="javascript:void(0)" data-event="Track_Sale_Filter_Area"><span  class="areaid" ><?=$rname ?></span></a>

	     <a href="javascript:void(0);" id="list_keyword" style="display: none"> <span> <?=$rname?> </span> </a> 

	     <span class="s1"></span>

	     <a id= "list_price" href="javascript:void(0);" data-event="Track_Sale_Filter_Price" ><span class="priceid"><?=$pname?></span></a> 

	     <span class="s1"></span>

	     <a id="list_housetype" href="javascript:void(0);" data-event="Track_Sale_Filter_Housetype" ><span class="housetypeid"><?=$hname?></span></a> 

	  	

	  </div>

	   <div class="jiejing_tb"> <div class="ditu_fh" style="width:15%; float:left; margin-top:7px; margin-left:5px; background-color:#28a2a7; border:0; height:26px; color:#FFF; text-align:center; line-height:26px;"><a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$xfdrs["ID"] ?>" data-city="tj">返回</a></div>

	   	<input type="text" name="mohu" id="mohu" value="<?= $mohu?>" class="jiejing_text"/><input type="button" name="sbiton" id="sbiton" value=" " class="jiejing_an"/>

	    &nbsp;

	     <select id="yewu" name="yewu"  onchange="yewu(this);" style="width:25%; height:31px; margin-top:5px; margin-left:5px; float:left;">

			     

			<option value="mm" <?= $YEWU =="mm"?"selected":""?> >出售</option>	     

			<option value="zl" <?= $YEWU =="zl"?"selected":""?> >出租</option>	     

	     </select></a>	  

 

	   </div> 

	   <script>

	   document.getElementById("yewu").onchange = function (){

			var Qurl = "?action=fysearch&y="+ document.getElementById("yewu").value;

			window.location.href = Qurl + QY + P + H ;

		}

	   document.getElementById("sbiton").onclick=function (){

//	  		alert(document.getElementById("mohu").value);

			var Murl="<?=$MURL?>ditu.php?y=<?=$YEWU ?>"+QY+P+H+"&mohu="+document.getElementById("mohu").value;

			window.location.href = Murl;

		}

	   </script>  

       

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

      <? //include_once 'getditulist.php';?>

      <?php  //fysearch($conn,$CID,filterParaNumber($_REQUEST["page"]),10);?>

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

<SCRIPT>var cityname='从化市';</SCRIPT>

<SCRIPT language=JavaScript type=text/javascript src="js/mapfy.js"></SCRIPT>

<SCRIPT>

/*

var mapdate =  new Array();



mapdate.push({MAP_Y:'117.230003',MAP_X:'39.119999',NAME:'汇通大厦',NUM:'6',TYPE:'出售'});

mapdate.push({MAP_Y:'117.169998',MAP_X:'39.139999',NAME:'格调春天',NUM:'1',TYPE:'出售'});



mapdate.push({MAP_Y:'117.150002',MAP_X:'39.130001',NAME:'禧顺花园',NUM:'1',TYPE:'出售'});

mapdate.push({MAP_Y:'117.181024',MAP_X:'39.135196',NAME:'伊顿玫瑰公寓',NUM:'1',TYPE:'出售'});

mapdate.push({MAP_Y:'117.190002',MAP_X:'39.139999',NAME:'新世界花园',NUM:'1',TYPE:'出租'});

mapdate.push({MAP_Y:'117.220001',MAP_X:'39.130001',NAME:'通达园',NUM:'1',TYPE:'出租'});

mapdate.push({MAP_Y:'117.199997',MAP_X:'39.119999',NAME:'吉利花园',NUM:'1',TYPE:'出售'});

mapdate.push({MAP_Y:'117.209999',MAP_X:'39.169998',NAME:'律笛里',NUM:'1',TYPE:'出租'});

mapdate.push({MAP_Y:'117.139999',MAP_X:'39.209999',NAME:'金苑公寓',NUM:'1',TYPE:'出租'});

mapdate.push({MAP_Y:'117.139999',MAP_X:'39.200001',NAME:'人民家园',NUM:'1',TYPE:'出租'});

*/

</SCRIPT>



