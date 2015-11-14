<?
$MENU="xq";
$MPOS="detail";
include_once 'getxqlist.php';
$xqdrs=xqdetail($conn,$CID,filterParaAllByName("id"));
$fy_description=get_utf8($xqdrs["DESCRIPTION"]);
$fy_title=get_utf8($xqdrs["PPNAME"].$xqdrs["PNAME"].$xqdrs["NAME"]);
$xqdrs2 = xqdetail_jjr($xqdrs["FK_USERID"],$CID);
include_once 'head.php';
include_once 'picys/ImageCompressUse.php';
 ?>
 
  <input id="pageInit" pageName="Prop_View" type="hidden" />  
  <div class="container" id='prop_view'>
   <div class="V">
    <div>
     <div class="H"  id="topbar">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$xqdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>小区详情
     </div>
     <div id="prop_view_boxContent">
      <div id="Prop_View_C" class="d" fyid="<?=$xqdrs["ID"] ?>" ctid='17' fyisauction="201">
       <div class="d1">
        <span fyid="<?=$xqdrs["ID"] ?>" ctid='17' id="ppcfyid" style="display: none;"></span>
        <?
        $photostr=explode(";",$xqdrs["DISPHOTO"]);
        ?>
        <div id='swipe' class='a1'>
         <div class="a4">
         <?
         foreach($photostr as $v){
         	echo "<div class='a2'>
           <img class='a3' src='img/view_default.jpg' data-src-swipe='".getCompressPic($v,50)."' />
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
        <span class="c11"><?=p_utf8($xqdrs["NAME"]) ?></span>
        <div class="c12">
         <label>
          <i class="i5">开发商：</i><i><?=p_utf8($xqdrs["KFS"]) ?></i>
         </label>
         <label>
          <i class="i5">二手房：</i><i class="i1"><a href="fylist.php?y=mm&re3=<?=get_utf8($xqdrs["NAME"])?>"><?=getSameDisCountByType1($conn,$CID,$xqdrs["ID"],get_gbk("出售"))?></a>套</i>
         </label>
         <label>
          <i class="i5">租&nbsp;&nbsp;&nbsp;&nbsp;房：</i><i class="i1"><a href="fylist.php?y=zl&re3=<?=get_utf8($xqdrs["NAME"])?>"><?=getSameDisCountByType1($conn,$CID,$xqdrs["ID"],get_gbk("出租"))?></a>套</i>
         </label>
         <label>
          <i class="i5">装&nbsp;&nbsp;&nbsp;&nbsp;修：</i><?=p_utf8($xqdrs["ZX"]) ?>
         </label>
         <label>
          <i class="i5">用&nbsp;&nbsp;&nbsp;&nbsp;途：</i><?=p_utf8($xqdrs["YT"]) ?>
         </label>
         <label>
          <i class="i5">物业费：</i><?=p_utf8($xqdrs["WYF"]) ?>元/平米
         </label>
         <label>
          <i class="i5">停车位：</i><?=p_utf8($xqdrs["CWSL"]) ?>个
         </label>

        </div>
        <div class="c2">
         <span>小区概况:</span>
         <span id="ajk_disc" class="c2m"><div id="ajk_disc_con" class="content fc1">
           <?=str_replace("|", "<br/>", get_utf8($xqdrs["DESCRIPTION"])); ?>
          </div>
         </span>
         <i id="showUp" class="c2z">展开</i>
         <i id="showDown" class="c2s">收起</i>
        </div>

        <div class="c52 cc52">
         <a href='index.php'>首页</a>&nbsp;&gt;&nbsp;
         <a href='xqlist.php?y=<?=$yewu ?>'>小区</a>&nbsp;&gt;&nbsp;
         <a href='xqlist.php?y=<?=$yewu ?>&rname=<?=p_utf8($xqdrs["PPNAME"]) ?>&re1=<?=p_utf8($xqdrs["PPNAME"]) ?>'> <?=p_utf8($xqdrs["PPNAME"]) ?> </a>&nbsp;&gt;&nbsp;
         <a href='xqlist.php?y=<?=$yewu ?>&rname=<?=p_utf8($xqdrs["PNAME"]) ?>&re2=<?=p_utf8($xqdrs["PNAME"]) ?>'> <?=p_utf8($xqdrs["PNAME"]) ?> </a>
        </div>
        <div class="c4">
         <div class="c41">
          <img src="img/peoType.png" data-src='<?=getCompressPic($xqdrs2["UPHOTO"]) ?>' />
         </div>
         <div class="c42">
          <label>
           <?=p_utf8($xqdrs["USER"]) ?>
          </label>
          <span> 联系方式： <i class="c40"> <?=p_utf8($xqdrs2["USERTEL"]) ?> </i> </span>
          <span>公司：<?=p_utf8($xqdrs2["DEPTNAME"]) ?></span>
         </div>
        </div>
        <a id="tel" phone="<?=p_utf8($xqdrs2["USERTEL"]) ?>" data-track-soj="track_prop_view_phone_call" class="userpeo android_phone" href="tel:<?=p_utf8($xqdrs2["USERTEL"]) ?>"> <i class="a7">联系经纪人</i> </a>
       </div>
       <input id="caller" value="anjuke" style="display: none;">
      </div>
     </div>
    </div>
   </div>
  </div>
  
<?include_once 'tail.php'; ?>
