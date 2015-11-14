<?
$MENU="fy";
$MPOS="detail";
$YEWU="mm";
include_once 'getfylist.php';
$YEWU=filterParaAllByName("y");
$fydrs=fydetail($conn,$CID,filterParaByName("id"));
$fyjjr=fyJjr($conn,$CID,$fydrs["USERID"]);
$title=$fydrs["TITLE"];
include_once 'head.php';
include_once 'picys/ImageCompressUse.php';
 ?>
 
  <input id="pageInit" pageName="Prop_View" type="hidden" />
  <div class="container" id='prop_view'>
   <div class="V">
    <div>
     <div class="H"  id="topbar">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$fydrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>房源详情
     </div>
     <div id="prop_view_boxContent">
      <div id="Prop_View_C" class="d" fyid="<?=$fydrs["ID"] ?>" ctid='17' fyisauction="201">
       <div class="d1">
        <span fyid="<?=$fydrs["ID"] ?>" ctid='17' id="ppcfyid" style="display: none;"></span>
        <?
        $photostr=explode(";",$fydrs["PHOTOS"]);
        if($fydrs["PHOTOS"]!=""){
        	foreach( $photostr as $k=>$v){
				if( !$v )
					unset( $photostr[$k] );
			}
        }
        ?>
        <div id='swipe' class='a1'>
         <div class="a4">
         <?
         foreach($photostr as $v){
			$photocompress=getCompressPic($v,80);
         	echo "<div class='a2'>
           <img class='a3' src='".$photocompress."' data-src-swipe='".$photocompress."' />
          </div>";
         }
         ?>
         </div>
         <nav class="a6">
         <span id="positions" class="position"> 
         <?
         for($fi=0;$fi<count($photostr);$fi++){
         	echo "<em ".($fi==0?"class='on'":"").">&bull;</em>&nbsp;";
         }
         ?>
          </span>
         </nav>
        </div>
       </div>
       <div class="d2">
        <span class="c11"><?=p_utf8($fydrs["TITLE"]) ?></span>
        <div class="c12">
           <label style="width:48%;display: inline-block;">
          <i class="i5">编号：</i><i><?=p_utf8($fydrs["CONTRACT_CODE"]) ?></i>
         </label>
         <label><i><a href="jsq/fdjsq_sy.php?price=<?=number_format($fydrs["PRICE"],0) ?>">贷款计算器</a></i></label>
         <label>
         <?if($YEWU=="mm"|| get_utf8($fydrs["TYPE"])=="出售"){ ?>
          <i class="i5">售价：</i><i class="i1"><?=number_format($fydrs["PRICE"],0) ?>万</i>
          <?}else{ ?>
          <i class="i5">租价：</i><i class="i1"><?=number_format($fydrs["PRICE"],0) ?>元/月</i>
          <?} ?>
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
         <label> 
          <i class="i5">楼层：</i><?=get_utf8($fydrs["FYFL"])//$fydrs["FLOOR"]."F/".$fydrs["TOP_FLOOR"].'F';getFloor($fydrs["FLOOR"],$fydrs["TOP_FLOOR"]) ?>
         </label>
         <label>
          <i class="i5">年代：</i><?=$fydrs["JZ_YEAR"] ?>年
         </label>
         <br />
         <label style="width: 98%;"> 
          <i class="i5" style="float:left;">标签：</i>
         <?php 
         			$color = array("RGB(255, 240, 157)","RGB(241, 241, 255)","RGB(243, 255, 230)");
         			if($fydrs["FWLABLE"]!=""){
                        $wflb = explode(";",$fydrs["FWLABLE"]);
                        for ($i=0;$i<count($wflb)&&$i<3;$i++){
							if(get_utf8($wflb[$i])!=""){
	                            
	                         echo " <span style='float: left;line-height: 15px;padding-top: 2px;border-top: 1px rgba(51, 53, 49, 0.1) solid;border-bottom: 1px rgba(51, 53, 49, 0.1) solid;margin-right: 6px;background-color: ".$color[$i].";'>".get_utf8($wflb[$i])."</span>";
	                           
                            }
                        }
         			}
                    ?>
         </label>
        </div>
        <div class="c52">
         <label>
          小区：
          <em class="fc1" id="commName"><?=p_utf8($fydrs["DISNAME"]) ?></em>
         </label>
        </div>
        <a href="fylist.php?y=<?=(get_utf8($fydrs["TYPE"])=="出售"?"mm":"zl") ?>&rname=<?=get_utf8($fydrs["RE1"]) ?>&re1=<?=get_utf8($fydrs["RE1"]) ?>&re3=<?=get_utf8($fydrs["DISNAME"]) ?>" id="sameComm" class="c52 c53" tag="天津" source="normal"> <label class="ca">
          同小区房源：<em class="fc1"><b class="i1"><?=getSameDisCount1($conn,$CID,$fydrs["DISID"],$fydrs["RE1"],$fydrs["TYPE"])?></b> 套</em>
         </label> </a>
        <div class="c2">
         <span>详细描述:</span>
         <span id="ajk_disc" class="c2m"><div id="ajk_disc_con" class="content fc1">
           <?=str_replace("【", "<br/>【", get_utf8($fydrs["MEMO"])); ?>
          </div>
         </span>
         <i id="showUp" class="c2z">展开</i>
         <i id="showDown" class="c2s">收起</i>
        </div>
        <!-- 
        <div class="c52">
         <label><a href='jsq/fdjsq_sy.php'>贷款计算器</a></label>
        </div>
         -->
        <div class="c52 cc52">
         <a href='index.php'>首页</a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$YEWU ?>'><?if($YEWU=="mm" || get_utf8($fydrs["TYPE"])=="出售"){echo "二手房";}else{echo "租房";}?></a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$YEWU ?>&rname=<?=p_utf8($fydrs["RE1"]) ?>&re1=<?=p_utf8($fydrs["RE1"]) ?>'> <?=p_utf8($fydrs["RE1"]) ?> </a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$YEWU ?>&rname=<?=p_utf8($fydrs["RE2"]) ?>&re2=<?=p_utf8($fydrs["RE2"]) ?>'> <?=p_utf8($fydrs["RE2"]) ?> </a>
        </div>
        <div class="c4">
         <div class="c41">
          <img src="img/peoType.png" data-src='<?=getCompressPic($fyjjr["UPHOTO"],"","","img/peoType.png"); ?>' />
         </div>
         <div class="c42">
          <label>
           <?=p_utf8($fydrs["USERNAME"]) ?>
          </label>
          <span> 联系方式： <i class="c40"> <?=p_utf8(substr($fyjjr["UTEL"],0,11)) ?> </i> </span>
          <span>公司：<?=p_utf8($fydrs["DEPTNAME"]) ?></span>
         </div>
        </div>
        <a id="tel" phone="<?=p_utf8($fyjjr["UTEL"]) ?>" data-track-soj="track_prop_view_phone_call" class="userpeo android_phone" href="tel:<?=p_utf8($fyjjr["UTEL"]) ?>"> <i class="a7">联系经纪人</i> </a>
       </div>
       <input id="caller" value="anjuke" style="display: none;">
      </div>
     </div>
    </div>
   </div>
  </div>
  
<?include_once 'tail.php'; ?>
