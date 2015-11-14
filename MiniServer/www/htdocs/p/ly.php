<?include_once 'INCLUDE.php'; ?>
<?
$MPOS="ly";
include_once 'head.php'; 

$act=filterParaAll("act");
if($act=="save"){
	$sql="insert into XT_TS (CID,TSDATE,TITLE,CONTENT,TEL) values('".$CID."',SYSDATE(),'".get_gbk(filterPara("TITLE"))."','".get_gbk(filterPara("CONTENT"))."','".get_gbk(filterPara("TEL"))."')";
	execute($sql);
	echo "<script>location.href='?s=1';</script>";
}
?>

 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
 <link href="css/List.css" rel="stylesheet" type="text/css" />
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L"> <div class="H">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>我要留言
       </div>     
   <div class="ipad_left">
    <div class="ipad_left_menu">
      <ul>
        <li class="ipad_left_menu1"><div class="menu_tb"><img src="netimages/ipad1.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad1.png',sizingMethod='image'); " /> <div class="menu_name">二手房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad2.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad2.png',sizingMethod='image'); " /> <div class="menu_name">租房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad3.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad3.png',sizingMethod='image'); " /> <div class="menu_name">小区</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad4.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad4.png',sizingMethod='image'); " /> <div class="menu_name">新房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad5.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad5.png',sizingMethod='image'); " /> <div class="menu_name">经纪人</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad6.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad6.png',sizingMethod='image'); " /> <div class="menu_name">委托</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad7.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad7.png',sizingMethod='image'); " /> <div class="menu_name">关于</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="netimages/ipad8.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/ipad8.png',sizingMethod='image'); " /> <div class="menu_name">地图</div></div></li>
        <li><input type="text" name="textfield3" style="width:55%; float:left; margin-top:10px; margin-left:20px; height:22px; border:1px solid #ccc;"><input name="button" type="submit" class="search" id="button" value="查询"  style="width:25%; float:left; margin-top:10px; margin-left:10px; background-color:#28a2a7; border:0; height:25px; color:#FFF;"/></li>
      </ul>
    </div>
   </div>
    <div class="ipad_right">
     <div class="list_header_container">
      <div id="list_header">
        
      </div>
     </div>
     
     <div style="text-align:center;">
     <?
     $msg=filterPara("s");
     if($msg=="1"){
     	echo "提交成功！";
     }
     ?></div>
     
      <form name="lyform" action="ly.php?act=save" method="post">
      <div class="drop" id="drop"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>
            <td height="30" valign="bottom">留言标题</td>
          </tr>
          <tr>
            <td height="50"><input type="text" name="TITLE" id="TITLE" class="weituo_border" style="height:30px;" /></td>
          </tr>
          <tr>
            <td height="30" valign="bottom">留言内容</td>
          </tr>
          <tr>
            <td height="110" valign="middle"><textarea name="CONTENT" class="weituo_border" style="height:90px;"></textarea></td>
          </tr>
          <tr>
            <td height="30" valign="bottom">联系方式</td>
          </tr>
          <tr>
            <td height="50"><input type="text" name="TEL" id="TEL" class="weituo_border" style="height:30px;" /></td>
          </tr>
          <tr>
            <td width="100%" height="60" align="center"><div class="weituo_an"><img src="netimages/an.jpg" width="100%" onclick="document.lyform.submit();"/></div></td>
          </tr>
        </table>
      </div>
      </form>
          
     
     </div>
     </div>
    </div>    <script type="text/javascript"><!--function check(){	var myform = document.getElementById("lyform");    var TITLE= document.getElementById("TITLE").value;    var CONTENT= document.getElementById("CONTENT").value;    var TEL= document.getElementById("TEL").value;    if(TITLE==""){ alert("留言标题不能为空!"); return ;}    if(CONTENT==""){ alert("留言内容不能为空!");  return ; }    if(TEL==""){ alert("联系方式不能为空!");  return ;}    myform.submit();    }//--></script>
    <br/><br/><br/>
<?include_once 'tail2.php'; ?>
