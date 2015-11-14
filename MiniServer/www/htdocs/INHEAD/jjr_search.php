  <div id="search1">
  <form id ="searchform" action="<?php echo $page?>">
  	<div id="search_box1">
		
        <dl>
  <dd class="dd1">区域：</dd>
  <dd class="dd2"  stype='re'>
   <a href="javascript:void(0);" <?php echo filterPara($_REQUEST["re1"])==""&&filterPara($_REQUEST["re2"])==""?"style='color: #ff7f00;'":""?>>不限</a>
   <?php 
       $i= 0;
       $re1 = array();
       $stmt1 = mysql_query("select * from PZ_RE1 where CID = '".$CID."' and IF_TB = 1",$conn);
       while($rs1 = mysql_fetch_array($stmt1)){
            $i++;
            $re1[$i] = array('name' =>$rs1["NAME"],'i'=>$i );
            echo "<a href='javascript:void(0);' ".(filterPara($_REQUEST["re1"])==$rs1["NAME"]?"style='color: #ff7f00;'":"").">".$rs1["NAME"]."</a>";
        }       
   ?>  
  </dd>
  <input  id= "re1" name="re1" type="hidden" value="<?php echo filterPara($_REQUEST["re1"])?>"/>
  <input  id= "re2" name="re2" type="hidden" value="<?php echo filterPara($_REQUEST["re2"])?>"/>
  
  <div class="clear"></div>
  
  <?php  foreach ($re1 as $re11) { ?>
  <div id="aa<?php echo $re11["i"]?>"style ="display: none;" class="all_area2">
  <div class="apDiv1"><img src="/images/jt.png" width="11" height="7" /> </div>
  <div  class="all_area">  
        	<ul>
        	<li><a href='javascript:void(0);' value="<?php echo $re11["name"]?>" <?php echo filterPara($_REQUEST["re1"])!=""&&filterPara($_REQUEST["re2"])==""?"style='color: #ff7f00;'":""?>>不限</a></li>
        	<?php 
            	$stmt2 = mysql_query("select * from PZ_RE2 where CID = '".$CID."' and PNAME='".$re11["name"]."'",$conn);
            	while($rs2 = mysql_fetch_array($stmt2)){
        	        echo "<li><a href='javascript:void(0);' ".(filterPara($_REQUEST["re2"])==$rs2["NAME"]?"style='color: #ff7f00;'":"")." >".$rs2["NAME"]."</a></li>";
                 }
        	?>                
        </ul>            
  </div>
</div>
<?php }?>
</dl>
        
        
    </div>
    <div id="search_box2">

    	<div class="left"><input name="mohu" title="请输入城区、商圈、小区名或经纪人名..." value="<?php echo filterPara($_REQUEST["mohu"])?>"  type="text" style="height:18px; width:250px; color:#999; margin-top:8px;" /><input id="searchbutton" type="button"  value="搜索" /></div>
        <div class="right">显示顺序：<select name="ordern">
          <option value ="default" <?php echo filterParaAll($_REQUEST["ordern"])=="default"?"selected":""?>>默认</option>

          <option value ="zl" <?php echo filterParaAll($_REQUEST["ordern"])=="zl"?"selected":""?>>租赁</option>
          <option value ="mm" <?php echo filterParaAll($_REQUEST["ordern"])=="mm"?"selected":""?>>买卖</option>
      </select></div>
    </div>
    </form>
  </div>
  