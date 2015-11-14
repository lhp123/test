<?php 
$pos = "经纪人";
$page = "jjr_list.php";
?>
<?php include_once 'head.php';?>

<?php 
include_once 'action/JjrAction.php';
include_once 'action/FyAction.php';
$jjrAction=new JjrAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);
$result=$jjrAction->getJjrList(5);
?>
<div id="center">
<?include_once 'INHEAD/jjr_search.php';?>
  <div id="jjr_list">
  <div id="jjr_list_titi">
  	共找到经纪人<span class="org1"><?php echo $result["rows"]?></span>位
  </div>
  <div id="jjr_list_main">
  	<?php 
  	while($rs = mysql_fetch_array($result["result"])){
	?>
  	<div id="jjr_list_main_box" class="jjr_list_box">
    	<div id="jjr_list_main_box_l">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        	<tr>
            	<td align="center" ><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["ID"]?>"><img src="<?php echo getPicWithFirst($rs["PHOTO"],"",ZW_JJR);?>" width="106" height="139" /></a></td>
                <tr>
                	<td align="center" height="22"><span class="blu"><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["ID"]?>"><?php echo $rs["USERNAME"]?></a></span></td>
                </tr>
                <tr>
                	<td align="center" height="22"><span class="org1"><?php echo $rs["TEL"]?></span></td>
                </tr>
            </tr>
        </table>
   	    
        </div>
        <div id="jjr_list_main_box_r">
        	<div>
           	服务商圈：
           	<?php 
           	echo $rs["RE1"]."&nbsp;&nbsp;".$rs["RE2"]; 
           	?>
           	
           	<br />所属门店：<?php echo $rs["DEPTNAME"]?>
           	<span style="float:right;margin-right:10px;">
           	出租：<span class="org1"><?php echo $rs["ZLFY_NUM"]?></span>套&nbsp; &nbsp;
           	出售：<span class="org1"><?php echo $rs["MMFY_NUM"]?></span>套&nbsp; &nbsp;  
           	点击量：<span class="org1"><?php echo $rs["NUM"]?></span>&nbsp; &nbsp;  
           	近30天带看量：<span class="org1"><?php echo $rs["DK_NUM"]?></span>
           	</span>

            
            </div>
            <div>
            	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#cccccc 1px solid; line-height:25px;">
                	<tr>
                    	<td style="margin:2px; border-top:#FFF 1px solid; border-left:#FFF 1px solid; padding-left:10px;" bgcolor="#f0f0f0">经纪人推荐</td>
                        <td style="margin:2px; border-top:#FFF 1px solid;" bgcolor="#f0f0f0" align="center">户型</td>
                        <td style="margin:2px; border-top:#FFF 1px solid;" bgcolor="#f0f0f0" align="center">面积</td>
                        <td style="margin:2px; border-top:#FFF 1px solid; border-right:#FFF 1px solid;" bgcolor="#f0f0f0" align="center">总价</td>
                    </tr>
                     <?php 
                     $jjrfystmt=$fyAction->getFyByJjr(3,$rs["ID"],"",true);
                     while($rsfy=mysql_fetch_array ( $jjrfystmt["result"] )){
                     ?>
                     <tr>
	                     <td style='padding-left:10px;'><span class='blu'><a href='mmfy_detail.php?id=<?php echo $rsfy["ID"]?>'><?php echo $rsfy["TITLE"]?></a></span></td>
	                     <td align='center'><?php echo $rsfy["H_SHI"]?>室<?php echo $rsfy["H_TING"]?>厅</td>
	                     <td align='center'><?php echo $rsfy["BUILD_AREA"]?>平米</td>
	                     <td align='center'><span class='org1'><?php echo $rsfy["TYPE"]=="出售"?numberFormatBySelf($rsfy["PRICE"])."万":numberFormatBySelf($rsfy["PRICE"])?>元</span></td>
                     </tr>
             		<?php }?>
                   
                    
                </table>
          </div>
        </div>
    </div>
   <?php }?>    
 
    <?php echo $result["pagebar"];?>
    
  </div>
  
  </div>
  <div id="zjjjr">
  	<div id="zjjjr_tit"><img src="images/ico6.jpg" width="12" height="13" /><span class="blu" style="margin-left:5px;">最佳经纪人</span></div>
    <div id="zjjjr_main">
    	<ul>
       	  <?php 
       	        $resulttj = $jjrAction->getJjr(5,true);
       	        while($rs = mysql_fetch_array($resulttj["result"])){
       	  ?>
          <li>
            	<div class="left"> <a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["ID"]?>"><img src="<?php echo getPicWithFirst($rs["PHOTO"],"",ZW_JJR);?>" width="60" height="80" /></a> </div>
              <div class="left" style="line-height:20px; margin-left:10px;width: 180px;">
              	<span class="blu"><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["ID"]?>"><?php echo $rs["USERNAME"]?></a></span><br />
                                                服务小区：<?php 
                               	    $fwsq = explode(";",$rs["ZGXQ"]) ;
                               	    echo $fwsq[0];
                               	          
                               	?><br />
                                                服务范围：<?php 
                               	    $fwsq = explode(";",$rs["RE2"]) ;
                               	    echo $fwsq[0];
                               	          
                               	?><br />
                                                电话：<span class="org" style="font-size:14px;"><?php echo $rs["TEL"]?></span>
           	  </div>
       	  </li>	
       	  <?php }?>
        </ul>
    </div>
  </div>
</div>

<?php include_once 'tail.php';?>