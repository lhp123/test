<?
	$sqlqq = "select QQ from XT_COM where ID='".$CID."'";
	$stmqq=mysql_query($sqlqq,$conn);
	if($rsqq= mysql_fetch_array($stmqq)){
			$QQ=explode(";",$rsqq["QQ"]);
	}
	if($rsqq["QQ"]!=""&&count($QQ)>=1){		
?>

<script>

var online=new Array();
if (!document.layers)

document.write('<div id=divStayTopLeft style=position:absolute>');

document.write('<table cellSpacing="0" cellPadding="0" width="110" border="0" id="qqtab">');

document.write('    <tr>');

document.write('      <td width="110" onclick="if(document.all.qqtab.style.display==\'none\'){document.all.qqtab.style.display=\'\'} else {document.all.qqtab.style.display=\'none\'}"><img src="/images/ndfc_cfQQ.jpg" border="0"></td>');

document.write('    </tr>');

document.write('    <tr id="qqstab">');

document.write('      <td valign="middle" align="center" background="/images/ndfc_midqq.jpg">');

document.write('<table border="0" width="90" cellSpacing="0" cellPadding="0">');

document.write('  <tr>');

document.write('    <td width="90" height="5" border="0" colspan="2"></td>');

document.write('  </tr>');

document.write('  <tr>');


<?

		for($i=0;$i<count($QQ);$i++){
			if($QQ[$i]!=""){
?>

	document.write('<tr>');

	document.write('    <td width="5" height="29" valign="middle" align="left">');

    document.write('    </td>');

    document.write('    <td width="65" height="29" valign="middle" align="left">');

    document.write('<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $QQ[$i];?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $QQ[$i];?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a><br>');

    document.write('    </td>');

	document.write('</tr>');

<?}}?>


document.write('  </tr>');

document.write('</table>');

document.write('</td>');

document.write('    </tr>');

document.write('    <tr>');

document.write('<td width="110"><a target="_blank"><img src="/images/ndfc_bottomqq.jpg" border="0"></a></td>');

document.write('    </tr>');

document.write('</table>');

var verticalpos="frombottom"

if (!document.layers)

document.write('</div>')

function scrollqq()

{

  var posXqq,posYqq;

 if (window.innerHeight)

 {

  posXqq=window.pageXOffset;

  posYqq=window.pageYOffset;

   }

   else if (document.documentElement && document.documentElement.scrollTop)

      {

    posXqq=document.documentElement.scrollLeft;

    posYqq=document.documentElement.scrollTop;

    }

    else if (document.body)

      {

    posXqq=document.body.scrollLeft;

    posYqq=document.body.scrollTop;

      }

     var divStayTopLeft=document.getElementById("divStayTopLeft");

    divStayTopLeft.style.top=(posYqq+520-500)+"px";

  divStayTopLeft.style.left=(posXqq+screen.width-136)+"px";

  setTimeout("scrollqq()",500);

    }

      scrollqq();



</script>
<?}?>