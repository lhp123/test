<?
$MENU="xf";
$MPOS="detail";
include_once 'getxflist.php';
$yewu=filterParaAllByName("y");
$xfdrs=xfdetail($conn,$CID,filterParaAllByName("id"));
$fy_description=get_utf8($xfdrs["TITLE"]);
$fy_title=get_utf8($xfdrs["TITLE"]);
include_once 'INCLUDE.php';
include_once 'head.php';
include_once 'picys/ImageCompressUse.php';
 ?>
 
  <input id="pageInit" pageName="Prop_View" type="hidden" />
  <div class="container" id='prop_view'>
   <div class="V">
    <div>
     <div class="H"  id="topbar">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$xfdrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>新房详情
     </div>
     <div id="prop_view_boxContent">
      <div id="Prop_View_C" class="d" fyid="<?=$xfdrs["ID"] ?>" ctid='17' fyisauction="201">
       <div class="d1">
        <span fyid="<?=$xfdrs["ID"] ?>" ctid='17' id="ppcfyid" style="display: none;"></span>
        <?
        $photostr=explode(";",$xfdrs["HXTPHOTO"]);
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
        <span class="c11"><?=get_utf8($xfdrs["LPNAME"]) ?></span>
        <div class="c12">
         <label>
          <i class="i5">地址：</i><i><?=get_utf8($xfdrs["WYDZ"]) ?></i>
         </label>
         <label>
          <i class="i5">参考价：</i><i class="i1"><?=$xfdrs["JUNJIA"]>=10000?number_format($xfdrs["JUNJIA"]/10000,1)."万":$xfdrs["JUNJIA"] ?>元</i>
         </label>
         <label>
          <i class="i5">物业费：</i><?=get_utf8($xfdrs["WYF"])?>/平米
         </label>
         <label>
          <i class="i5">房型：</i><?=get_utf8($xfdrs["WYLX"]) ?>
         </label>
         <label>
          <i class="i5">主推：</i><?=get_utf8($xfdrs["ZXZK"]) ?><?=get_utf8($xfdrs["H_SHI"]) ?>室<?=get_utf8($xfdrs["BUILD_AREA"]) ?>平方
         </label>
         <label>
          <i class="i5">开盘：</i><?=get_utf8($xfdrs["KPSJ"]) ?>
         </label>
         <label>
          <i class="i5">占地：</i><?=$xfdrs["ZDMJ"]>=10000?number_format($xfdrs["ZDMJ"]/10000,1)."万":$xfdrs["ZDMJ"] ?>平米
         </label>
         <label>
          <i class="i5">建筑：</i><?=$xfdrs["JZMJ"]>=10000?number_format($xfdrs["JZMJ"]/10000,1)."万":$xfdrs["JZMJ"] ?>平米
         </label>
         <label>
          <i class="i5">车位：</i><?=get_utf8($xfdrs["CWXX"]) ?>
         </label>
         <label>
          <i class="i5">热线：</i><i class="i1"><?=get_utf8($xfdrs["TEL"]) ?></i>
         </label>
        </div>
        <div class="c52">
         <label>
          开发商：
          <em class="fc1" id="commName"><?=p_utf8($xfdrs["KFS"]) ?></em>
         </label>
        </div>        
        <div class="c2">
         <span>项目特色:</span>
         <span id="ajk_disc" class="c2m"><div id="ajk_disc_con" class="content fc1">
           <?=p_utf8($xfdrs["LPZK"]) ?></br>
           <?=p_utf8($xfdrs["XMTS"]) ?>
          </div>
         </span>
         <i id="showUp" class="c2z">展开</i>
         <i id="showDown" class="c2s">收起</i>
        </div>   
        <div class="c52 cc52">
         <a href='index.php'>首页</a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$yewu ?>'><?php echo p_utf8($CITYNAME);?>新房</a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$yewu ?>&rname=<?=p_utf8($xfdrs["RE1"]) ?>&re1=<?=p_utf8($xfdrs["RE1"]) ?>'> <?=p_utf8($xfdrs["RE1"]) ?> </a>&nbsp;&gt;&nbsp;
         <a href='fylist.php?y=<?=$yewu ?>&rname=<?=p_utf8($xfdrs["RE2"]) ?>&re2=<?=p_utf8($xfdrs["RE2"]) ?>'> <?=p_utf8($xfdrs["RE2"]) ?> </a>
        </div>
        <div class="mz">
         详情请致电物业顾问,以物业顾问信息为准
        </div>
         <a style=" left:0px;" id="tel" phone="<?=p_utf8($xfdrs["TEL"]) ?>" data-track-soj="track_prop_view_phone_call" class="userpeo android_phone" href="tel:<?=p_utf8($xfdrs["TEL"]) ?>"> <i style="top:0px; font-size:16px;" class="a7">服务热线</i> </a>
       </div>
       <input id="caller" value="anjuke" style="display: none;">
      </div>
     </div>
    </div>
   </div>
  </div>
  
<?include_once 'tail.php'; ?>
