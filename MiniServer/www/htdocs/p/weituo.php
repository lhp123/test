<?include_once 'INCLUDE.php'; ?>
<?
$MENU="wt";
$MPOS="wt";
include_once 'head.php'; 

$act=filterParaAllByName("act");
if($act=="save"){
	$t=filterParaAllByName("t");
	if($t=="cs"){
		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("出售")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="cz"){
		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("出租")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="qz"){
		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("求租")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="qg"){
		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("求购")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
}
?>

 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
 <link href="css/List.css" rel="stylesheet" type="text/css" />
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L"><div class="H">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>委托房源
       </div>
<?include_once 'menu.php';?>
   
    <div class="ipad_right">
     <div class="list_header_container">
      <div id="list_header">

       
       
       
      </div>
     </div>
     
     <div class="weituo">委托类型</div>
     <br/>
     <div class="weituo2">
     <a href="#" class="search1" id="buy3" onclick="javascript:search1(3)">出售&nbsp;</a> | 
     <a href="#" class="search2" id="buy4" onclick="javascript:search1(4)">&nbsp;出租&nbsp;</a> | 
     <a href="#" class="search2" id="buy1" onclick="javascript:search1(1)">&nbsp;求购&nbsp;</a> | 
     <a href="#" class="search2" id="buy2" onclick="javascript:search1(2)">&nbsp;求租</a>
     </div>
     <br/>
     <div style="text-align:center;">
     <?
     $msg=filterParaAllByName("s");
     if($msg=="1"){
     	echo "提交成功！";
     }
     ?></div>
       <form id="qgform" name="qgform" action="weituo.php?act=save&t=qg" method="post">      <div class="drop" id="drop1"><table width="100%" border="0" cellspacing="0" cellpadding="0">          <tr>            <td height="30" valign="bottom">求购委托</td>          </tr>          <tr>            <td height="110" valign="middle"><textarea name="MEMO"  id="MEMO" class="weituo_border" style="height:90px;"></textarea></td>          </tr>          <tr>            <td height="30" valign="bottom">称呼</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKNAME" id="LINKNAME" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td height="30" valign="bottom">联系方式</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKTEL" id="LINKTEL" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td width="100%" height="60" align="center"><div class="weituo_an"><img src="netimages/an.jpg" width="100%" onclick="check1();"/></div></td>          </tr>        </table>      </div>      </form> <script type="text/javascript">function check1(){	var myform = document.getElementById("qgform");        var CONTENT= document.getElementById("MEMO").value;    var TITLE= document.getElementById("LINKNAME").value;    var TEL= document.getElementById("LINKTEL").value;    if(CONTENT==""){ alert("内容不能为空!");  return ; }    if(TITLE==""){ alert("称呼不能为空!"); return ;}    if(TEL==""){ alert("联系方式不能为空!");  return ;}    myform.submit();    }</script>            <form id="qgform2" name="qzform" action="weituo.php?act=save&t=qz" method="post">      <div class="drop" id="drop2" style="display:none;"><table width="100%" border="0" cellspacing="0" cellpadding="0">          <tr>            <td height="30" valign="bottom">求租委托</td>          </tr>          <tr>            <td height="110" valign="middle"><textarea name="MEMO"  id="MEMO2" class="weituo_border" style="height:90px;"></textarea></td>          </tr>          <tr>            <td height="30" valign="bottom">称呼</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKNAME" id="LINKNAME2" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td height="30" valign="bottom">联系方式</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKTEL" id="LINKTEL2" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td width="100%" height="60" align="center"><div class="weituo_an"><img src="netimages/an.jpg" width="100%" onclick="check2();"/></div></td>          </tr>        </table>      </div>      </form>       <script type="text/javascript">function check2(){	var myform = document.getElementById("qgform2");        var CONTENT= document.getElementById("MEMO2").value;    var TITLE= document.getElementById("LINKNAME2").value;    var TEL= document.getElementById("LINKTEL2").value;        if(CONTENT==""){ alert("内容不能为空!");  return ; }    if(TITLE==""){ alert("称呼不能为空!"); return ;}    if(TEL==""){ alert("联系方式不能为空!");  return ;}    myform.submit();    }</script>      <form id="qgform3" name="csform" action="weituo.php?act=save&t=cs" method="post">     <div class="drop" id="drop3" style="display:none;"><table width="100%" border="0" cellspacing="0" cellpadding="0">          <tr>            <td height="25" valign="bottom">出售委托</td>          </tr>          <tr>            <td height="110" valign="middle"><textarea name="MEMO" id="MEMO3" class="weituo_border" style="height:90px;"></textarea></td>          </tr>          <tr>            <td height="30" valign="bottom">称呼</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKNAME" id="LINKNAME3" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td height="30" valign="bottom">联系方式</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKTEL" id="LINKTEL3" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td width="100%" height="60" align="center"><div class="weituo_an"><img src="netimages/an.jpg" width="100%" onclick="check3();"/></div></td>          </tr>        </table>      </div>      </form>      <script type="text/javascript">       function check3(){      	var myform = document.getElementById("qgform3");                    var CONTENT= document.getElementById("MEMO3").value;          var TITLE= document.getElementById("LINKNAME3").value;          var TEL= document.getElementById("LINKTEL3").value;                    if(CONTENT==""){ alert("内容不能为空!");  return ; }          if(TITLE==""){ alert("称呼不能为空!"); return ;}          if(TEL==""){ alert("联系方式不能为空!");  return ;}          myform.submit();                }      </script>      <form id="qgform4" name="czform" action="weituo.php?act=save&t=cz" method="post">     <div class="drop" id="drop4" style="display:none;"><table width="100%" border="0" cellspacing="0" cellpadding="0">          <tr>            <td height="30" valign="bottom">出租委托</td>          </tr>          <tr>            <td height="110" valign="middle"><textarea name="MEMO" id="MEMO4" class="weituo_border" style="height:90px;"></textarea></td>          </tr>          <tr>            <td height="30" valign="bottom">称呼</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKNAME" id="LINKNAME4" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td height="30" valign="bottom">联系方式</td>          </tr>          <tr>            <td height="50"><input type="text" name="LINKTEL" id="LINKTEL4" class="weituo_border" style="height:30px;" /></td>          </tr>          <tr>            <td width="100%" height="60" align="center"><div class="weituo_an"><img src="netimages/an.jpg" width="100%" onclick="check4();"/></div></td>          </tr>        </table>      </div>     </form>     <script type="text/javascript">     function check4(){     	var myform = document.getElementById("qgform4");                  var CONTENT= document.getElementById("MEMO4").value;         var TITLE= document.getElementById("LINKNAME4").value;         var TEL= document.getElementById("LINKTEL4").value;                  if(CONTENT==""){ alert("内容不能为空!");  return ; }         if(TITLE==""){ alert("称呼不能为空!"); return ;}         if(TEL==""){ alert("联系方式不能为空!");  return ;}         myform.submit();              }     </script>     </div>     </div>    </div>  <br/><br/><br/>
  
<!-- 
<div id="" class="userpeo" >TEST</div>
 -->

<?include_once 'tail2.php'; ?>
<script>
var house;
function search1(house){
/*alert(house);*/
	for(i=1;i<5;i++){
		if(i==house){
			document.getElementById("buy"+i).className="search1";
			document.getElementById("drop"+i).style.display="block";
			
	
		}else{
			document.getElementById("buy"+i).className="search2";
			document.getElementById("drop"+i).style.display="none";
			
		}
	}
}
search1(3);
</script>