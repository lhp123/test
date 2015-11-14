      <div id="right_box_main">
          <?php 
          $sql_from = "from FY f  WHERE f.CID = '".$CID."' AND f.USERID = '".$jjr_rs["ID"]."' AND  f.TYPE='".($type=="mm"?"出售":"出租")."'  AND f.IFDELETED = 0 AND f.IF_SHOW = 1";
          //$sql_from = "from FY f  WHERE f.CID = '".$CID."' AND f.USERID = '".$jjr_rs["ID"]."' AND  f.TYPE='".($type=="mm"?"出售":"出租")."' and  f.IF_TJ = 1 AND f.IFDELETED = 0 AND f.IF_SHOW = 1";
          //echo $sql_from;
         
          ?>
      	 <table width="100%" border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td>
            小区：&nbsp;<span class='<?php echo filterParaByName("disname")==""?"org":"blu"?>'><a href="/jjrdp/jjr_fy.php?type=<?php echo $type?>&jjrid=<?php echo $jjr_rs["ID"]?>">不限</a></span> 
            <?php 
                
                $stmt = mysql_query("select count(f.ID) num ,DISNAME ".$sql_from." GROUP BY DISNAME",$conn);
                while ($rs = mysql_fetch_array($stmt)){
                    if($rs["num"]==0){
                        continue;
                    }
                    echo "<span class='".(filterParaByName("disname")==$rs["DISNAME"]?"org":"blu")."'><a href='/jjrdp/jjr_fy.php?type=".$type."&jjrid=".$jjr_rs["ID"]."&disname=".$rs["DISNAME"]."'>".$rs["DISNAME"]."</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                }
            ?>
                      
            </td>
        </tr>
        	<tr>
        	<td>
            户型：&nbsp;<span class='<?php echo filterParaNumberByName("shi")==""?"org":"blu"?>'><a href="/jjrdp/jjr_fy.php?type=<?php echo $type?>&jjrid=<?php echo $jjr_rs["ID"]?>">不限</a></span> 
            <?php 
                $stmt = mysql_query("select count(f.ID) num ,H_SHI ".$sql_from." GROUP BY H_SHI",$conn);
                while ($rs = mysql_fetch_array($stmt)){
                    if($rs["num"]==0){
                        continue;
                    }
                    echo "<span class='".(filterParaNumberByName("shi")==$rs["H_SHI"]?"org":"blu")."'><a href='/jjrdp/jjr_fy.php?type=".$type."&jjrid=".$jjr_rs["ID"]."&shi=".$rs["H_SHI"]."'>".$rs["H_SHI"]."室</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                }
            ?>         
            </td>
        </tr>
        	<tr>
        	<td>
            价格：&nbsp;<span class='<?php echo filterParaNumberByName("priceup")==""&&filterParaNumberByName("pricedown")==""?"org":"blu"?>'><a href="/jjrdp/jjr_fy.php?type=<?php echo $type?>&jjrid=<?php echo $jjr_rs["ID"]?>">不限</a></span> 
            <?php 
                $stmt1 = mysql_query("select * from PZ_BOUND where CID = '".$CID."' AND TYPE ='".($type=="mm"?"价格区间":"租赁价格区间")."' ORDER BY TABORDER  ");
                while($rs1 = mysql_fetch_array($stmt1)){
                    $sql = "select count(f.ID) num ".$sql_from." and f.PRICE <= '".$rs1["UP"]."' AND f.PRICE >= '".$rs1["DOWN"]."'";
                   // echo $sql1;
                   
                    $stmt = mysql_query($sql,$conn);
                    while ($rs = mysql_fetch_array($stmt)){
                           if($rs["num"]==0){
                                continue;
                            }
                        echo "<span class='".(filterParaNumberByName("priceup")==$rs1["UP"]&&filterParaNumberByName("pricedown")==$rs1["DOWN"]?"org":"blu")."'><a href='/jjrdp/jjr_fy.php?type=".$type."&jjrid=".$jjr_rs["ID"]."&pricedown=".$rs1["DOWN"]."&priceup=".$rs1["UP"]."'>".$rs1["MEMO"]."</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                    }
                }
                
            ?>    
            </td>
        </tr>
      </table>
      </div>