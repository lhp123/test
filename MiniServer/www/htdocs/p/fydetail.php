<?
$MENU="fy";
$MPOS="detail";
$YEWU="mm";
include_once 'picys/ImageCompressUse.php';
include_once 'getfylist.php';
include_once 'showFYPhoto.php';
$yewu=filterParaAll($_REQUEST["y"]);
$fydrs=fydetail($conn,$CID,filterParaAll($_REQUEST["id"]));
$fyjjr=fyJjr($conn,$CID,$fydrs["USERID"]);
$title=$fydrs["TITLE"];
include_once 'head.php';
 ?>

<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/lanrenxixi.js"></script>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<input id="pageInit" pageName="Prop_View" type="hidden" />
  <div class="container" id='prop_view'>
   <div class="V" style="position: absolute; width:100%; height:100%; background-color:#333;">
<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:9999;width:100%;height:100%;display:none;">

		<div id="innerdiv" style="position:absolute;"><img id="bigimg" style="border:5px solid #fff;" src="" /></div>

		

		</div>
     
     
     <!-- 房源 图片 show -->
     <div id = "fytp" style="width:60%; height:100%; float:right; background-color:#333; position: fixed; z-index:1001;left:40%; overflow:hidden;">

     	
<?php 
$photoss=str_replace(";;",";",$fydrs["PHOTOS"]);

showPhoto($photoss)
?>
     	

  			<div class="tail" style="width:100%; height:20%;position: absolute; margin:0 auto; background:url(netimages/detail_bottom.jpg);background-position: center bottom; overflow:hidden;">

<table width="60%" border="0" cellspacing="0" cellpadding="0"

	align="center">

	
	<tr>

		<td width="27%" colspan="3" height="110" rowspan="4" align="center" valign="bottom"><img

			src="<?=getCompressPic($fyjjr["UPHOTO"],50,"",$JJRDEFPHOTO)?>" width="68" height="88" /></td>



	</tr>

	<tr>

		<td width="10%" height="70" align="left" class="detail_text"><img

			src="netimages/tx.jpg" width="19" height="22" /></td>

		<td width="63%" align="left" style="color: #FFF;"><strong><?=p_utf8($fydrs["USERNAME"]) ?>

		<?=p_utf8($fydrs["DEPTNAME"]) ?></strong></td>

	</tr>

	<tr>

		<td height="40" align="left"><img src="netimages/dh.jpg" width="19"

			height="22" /></td>

		<td height="40" align="left" style="color: #FFF;"><strong><?=$fyjjr["UTEL"] ?></strong></td>

	</tr>

</table>


</div>

     

     

     </div>
     
     <!-- 街景 -->
     <div id = "JIEJINGDIV" style="width:60%; height:105%; float:right; background-color:#333; position: fixed; left:40%;z-index:0;display: none;">
     	<script src="http://map.soso.com/api/v2/main.js?key=a0e9b58abf9bc7fb9da6dfb9ede95171"></script>
     	<input ID='XQNAME' name='XQNAME' type='hidden' value='<?=p_utf8($fydrs["RE2"].$fydrs["DISNAME"]) ?>'>
     	<script src="js/mapjj.js"></script>
     </div>
     
     
     <div id="prop_view_boxContent" style="width:40%; height:100%; float:left; margin-bottom:0px; background-color:#e7e8ec; position: absolute;">
     <div class="H">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$fydrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>房源详情
     </div>
      <div id="Prop_View_C" class="d" fyid="<?=$fydrs["ID"] ?>" ctid='17' fyisauction="201">
       <div class="d2">
        <span class="c11"><?=get_utf8($fydrs["TITLE"]) ?></span>
        <div class="c12">
         <label>
          <i class="i5">编号：</i><i><?=p_utf8($fydrs["CONTRACT_CODE"]) ?></i>
         </label>
         <label>
          <i class="i5"><?=(get_utf8($fydrs["TYPE"])=='出售'?'售价：':'租价：')?></i><i class="i1"><?=
          (get_utf8($fydrs["TYPE"])=='出售'?number_format($fydrs["PRICE"],0)."万":($fydrs["PRICE"]>10000?($fydrs["PRICE"]/10000)."万":number_format($fydrs["PRICE"],0)."元")) ?></i>
         </label>
         <label>
         <i class="i5">房型：</i><?=number_format($fydrs["H_SHI"],0) ?>室<?=number_format($fydrs["H_TING"],0) ?>厅<?=number_format($fydrs["H_WEI"],0) ?>卫
         </label>
         <label>
          <i class="i5">单价：</i><?=number_format($fydrs["JUNJIA"],0) ?>元/平米
         </label>
         <label>
          <i class="i5">面积：</i><?=number_format($fydrs["BUILD_AREA"],0) ?>平米
         </label>
         <label>
         <i class="i5">朝向：</i><?=p_utf8($fydrs["DIRECTION"]) ?>
         </label>
<!--          <label> 
          <i class="i5">楼层：</i><?//=$fydrs["FLOOR"].'F/'.$fydrs["TOP_FLOOR"].'F';//getFloor($fydrs["FLOOR"],$fydrs["TOP_FLOOR"]) ?>
         </label> -->
         <label>
          <i class="i5">装修：</i><?=p_utf8($fydrs["FITMENT"]) ?>
         </label>
         <label>
          <i class="i5">小区：</i><?=p_utf8($fydrs["DISNAME"]) ?>
         </label>
         <label>
          <i class="i5">年代：</i><?=$fydrs["JZ_YEAR"] ?>年
         </label>
          <br />
         <label style="width: 98%;"> 
          <i class="i5" style="float:left;">标签：</i>
                    <?php 
                    if ($fydrs["FWLABLE"]!=""){
                    	$wflb = explode(";",$fydrs["FWLABLE"]);
                        for ($i=0;$i<count($wflb)&&$i<3;$i++){
							if(get_utf8($wflb[$i])!=""){
	                            if($i%2==0){
	                               echo " <span style='float:left;line-height: 20px;border: 1px rgb(171, 240, 96) solid;margin-right: 5px;'>".get_utf8($wflb[$i])."</span>";
	                            }else{
	                                echo " <span style='float:left;line-height: 20px;border: 1px rgb(238, 125, 184) solid;margin-right: 5px;'>".get_utf8($wflb[$i])."</span>";
	                            }
                            }
                        }
                    }
                        
                    ?>
                      
			         
         </label>
        </div>
         
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="100%" align="center" ><a  onclick='jiejing();' href="javascript:void(0);"><img src="netimages/jiejing.jpg"  id ="SPhoto" width="293" height="40" /></a></td>
    <script>
    	function jiejing(){
        	var fytp = document.getElementById("fytp");
        	var jj = document.getElementById("JIEJINGDIV");
        	var SPhoto = document.getElementById("SPhoto");
			if(fytp.style.zIndex>0){
	        	jj.style.display = "";
				fytp.style.zIndex = "0";
	        	jj.style.zIndex = "1001";
	        	SPhoto.setAttribute("src", "<?=$MURL?>netimages/fytp.jpg");
//	        	alert(1);
	        	document.getElementById("am23").style.display="none";
			}else {
				fytp.style.zIndex = "1001";
	        	jj.style.zIndex = "0";
	        	SPhoto.setAttribute("src","<?=$MURL?>netimages/jiejing.jpg");
	        	document.getElementById("am23").style.display="block";
//alert(2);
			}
			
        }
    </script>
  </tr>
  <tr >
  <td id="am23"  width="100%" align="center"><font color="red" size="1">(街景地图加载需要一段时间，请您耐心等待)</font></td>
  </tr>
</table>

        <div class="c2">
         <span>详细描述:</span>
         <span id="ajk_disc" class="c2m"><div id="ajk_disc_con" class="content fc1">
           <?=str_replace("【", "<br/>【", get_utf8($fydrs["MEMO"])) ?>
          </div>
         </span>
         <i id="showUp" class="c2z">展开</i>
         <i id="showDown" class="c2s">收起</i>
        </div>

        <script type="text/javascript">
        $(document).ready(function(){
        	$("#showDown").click(function(){
        		$("#fytp").css({
        		    'height':'90%'
            		});
            	});
            };
        </script>
       </div>
       <input id="caller" value="anjuke" style="display: none;">
      </div>
     </div>
    </div>
   </div>
  </div>
  
<?include_once 'tail.php'; ?>

