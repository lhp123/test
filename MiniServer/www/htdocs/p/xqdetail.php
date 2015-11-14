<?
$MPOS="detail";
include_once 'getxqlist.php';
include_once 'showFYPhoto.php';
$xqdrs=xqdetail($conn,$CID,filterParaAll($_REQUEST["id"]));
$fy_description=get_utf8($xqdrs["DESCRIPTION"]);
$fy_title=get_utf8($xqdrs["PPNAME"].$xqdrs["PNAME"].$xqdrs["NAME"]);$xqdrs2 = xqdetail_jjr($xqdrs["FK_USERID"],$CID);
include_once 'head.php';
include_once 'picys/ImageCompressUse.php';
 ?>
 <link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/lanrenxixi.js"></script>
  <input id="pageInit" pageName="Prop_View" type="hidden" />  
  <div class="container" id='prop_view'>
   <div class="V" style="position: absolute; width:100%; height:100%;  background-color:#e7e8ec;">
   <div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:9999;width:100%;height:100%;display:none;">

		<div id="innerdiv" style="position:absolute;"><img id="bigimg" style="border:5px solid #fff;" src="" /></div>

		

		</div>
    <div>
     
     
     
     <div id= "fytp" style="width:60%; height:100%; float:right; background-color:#333; overflow:hidden; position:fixed; left:40%;">

        <?php showPhoto($xqdrs["DISPHOTO"])?>









<div class="tail"

	style="width: 100%; height: 20%; margin: 0 auto; background: url(netimages/detail_bottom.jpg); background-repeat: no-repeat; background-position: center bottom; overflow:hidden; position:absolute;">

<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">

	

	<tr>

		<td width="27%" height="110" rowspan="4" align="center" valign="bottom"><img

			src="<?php
			$deptPhoto = explode(";",$xqdrs["UPHOTO"]);
			echo getCompressPic($deptPhoto[0],50,"",$JJRDEFPHOTO);?>" width="68" height="88" /></td>

		<td height="20" colspan="2" align="left" class="detail_text">&nbsp;</td>

	</tr>

	<tr>

		<td width="10%" height="40" align="left" class="detail_text"><img

			src="netimages/tx.jpg" width="19" height="22" /></td>

		<td width="63%" align="left" style="color: #FFF;"><strong><?= get_utf8($xqdrs["DEPTNAME"])?></strong></td>

	</tr>

	<tr>

		<td height="40" align="left"><img src="netimages/dh.jpg" width="19"

			height="22" /></td>

		<td height="40" align="left" style="color: #FFF;"><strong><?= $xqdrs["USERTEL"]?></strong></td>

	</tr>



</table>



</div>





</div>
     
     <!-- 街景 -->
     <div id = "JIEJINGDIV" style="width:60%; height:100%; float:right; background-color:#333; position: absolute; left:40%;display: none;">
     	<script src="http://map.soso.com/api/v2/main.js?key=a0e9b58abf9bc7fb9da6dfb9ede95171"></script>
     	<input ID='XQNAME' name='XQNAME' type='hidden' value='<?=p_utf8($xqdrs["PNAME"].$xqdrs["NAME"])?>'>
     	<script src="js/mapjj.js"></script>
     </div>
     
     <div id="prop_view_boxContent" style="width:40%; min-height:576px; background-color:#e7e8ec;">
     <div class="H">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$xqdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>小区详情
     </div>
      <div id="Prop_View_C" class="d" fyid="<?=$xqdrs["ID"] ?>" ctid='17' fyisauction="201">
       
       <div class="d2">
        <span class="c11"><?=p_utf8($xqdrs["NAME"]) ?></span>
        <div class="c12">
         <label>
         
          <i class="i5">开发商：</i><i><?=p_utf8($xqdrs["KFS"]) ?></i>
         </label>
         <label>
          <i class="i5">二手房：</i><i class="i1"><a href="fylist.php?y=mm&did=<?=$xqdrs["ID"]?>"><?=getSameDisCountByType1($conn,$CID,$xqdrs["ID"],get_gbk("出售"))?>套</a></i>
         </label>
         <label>
          <i class="i5">租&nbsp;&nbsp;&nbsp;&nbsp;房：</i><i class="i1"><a href="fylist.php?y=zl&did=<?=$xqdrs["ID"]?>"><?=getSameDisCountByType1($conn,$CID,$xqdrs["ID"],get_gbk("出租"))?>套</a></i>
         </label>
         <label>
          <i class="i5">装&nbsp;&nbsp;&nbsp;&nbsp;修：</i><?=p_utf8($xqdrs["ZX"]) ?>
         </label>
         <label>
          <i class="i5">用&nbsp;&nbsp;&nbsp;&nbsp;途：</i><?=p_utf8($xqdrs["YT"]) ?>
         </label>
         <label>
          <i class="i5">物业费：</i><?=p_utf8($xqdrs["WYF"]) ?>
         </label>
         <label>
          <i class="i5">停车位：</i><?=p_utf8($xqdrs["CWSL"]) ?>个
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
        	//alert(SPhoto.src);
			if(fytp.style.display == ""){
				fytp.style.display = "none";
	        	jj.style.display = "";
	        	SPhoto.setAttribute("src", "netimages/xqtp.jpg");
	        	document.getElementById("am23").style.display="none";
			}else {
				fytp.style.display = "";
	        	jj.style.display = "none";
	        	SPhoto.setAttribute("src","netimages/jiejing.jpg");
	        	document.getElementById("am23").style.display="block";
			}
			
        }
    </script>
 
  </tr>
   <tr >
  <td id="am23"  width="100%" align="center"><font color="red" size="1">(街景地图加载需要一段时间，请您耐心等待)</font></td>
  </tr>
</table>
        <div class="c2">
         <span>小区概况:</span>
         <span id="ajk_disc" class="c2m"><div id="ajk_disc_con" class="content fc1">
           <?=str_replace("|", "<br/>", get_utf8($xqdrs["DESCRIPTION"])) ?>
          </div>
         </span>
         <i id="showUp" class="c2z">展开</i>
         <i id="showDown" class="c2s">收起</i>
        </div>

        
        
        
       </div>
       <input id="caller" value="anjuke" style="display: none;">
      </div>
     </div>
    </div>
   </div>
  </div>
  
<?include_once 'tail.php'; ?>
