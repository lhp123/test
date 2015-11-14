 <div class="xq_search">
          <?php 
          $sql_from = "from FY f  WHERE f.CID = '".$CID."' AND f.DISID = '".$xq_rs["ID"]."' AND  f.TYPE='".($type=="mm"?"出售":"出租")."'  AND f.IFDELETED = 0 AND f.IF_SHOW = 1";
          ?>
      	 <table width="100%" border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td>
            面积：&nbsp;<span class='<?php echo filterParaByName("areadown")==""&&filterParaByName("areaup")==""?"org":"blu"?>'><a href="xq_fy_list.php?type=<?php echo $type?>&xqid=<?php echo $xq_rs["ID"]?>">不限</a></span> 
              <?php 
                $stmt1 = mysql_query("select * from PZ_BOUND where CID = '".$CID."' AND TYPE ='面积区间' ORDER BY TABORDER  ");
                while($rs1 = mysql_fetch_array($stmt1)){
                    $sql = "select count(f.ID) num ".$sql_from." and f.BUILD_AREA <= '".$rs1["UP"]."' AND f.BUILD_AREA >= '".$rs1["DOWN"]."'";
                   // echo $sql1;
                   
                    $stmt = mysql_query($sql,$conn);
                    while ($rs = mysql_fetch_array($stmt)){
                           if($rs["num"]==0){
                                continue;
                            }
                        echo "<span class='".(filterParaNumberByName("areaup")==$rs1["UP"]&&filterParaNumberByName("areadown")==$rs1["DOWN"]?"org":"blu")."'><a href='xq_fy_list.php?type=".$type."&xqid=".$xq_rs["ID"]."&areadown=".$rs1["DOWN"]."&areaup=".$rs1["UP"]."'>".$rs1["MEMO"]."</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                    }
                }
                
            ?>   
                      
            </td>
        </tr>
        	<tr>
        	<td>
            户型：&nbsp;<span class='<?php echo filterParaNumberByName("shi")==""?"org":"blu"?>'><a href="xq_fy_list.php?type=<?php echo $type?>&xqid=<?php echo $xq_rs["ID"]?>">不限</a></span> 
            <?php 
                $stmt = mysql_query("select count(f.ID) num ,H_SHI ".$sql_from." GROUP BY H_SHI",$conn);
                while ($rs = mysql_fetch_array($stmt)){
                    if($rs["num"]==0){
                        continue;
                    }
                    echo "<span class='".(filterParaNumberByName("shi")==$rs["H_SHI"]?"org":"blu")."'><a href='xq_fy_list.php?type=".$type."&xqid=".$xq_rs["ID"]."&shi=".$rs["H_SHI"]."'>".$rs["H_SHI"]."室</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                }
            ?>         
            </td>
        </tr>
        	<tr>
        	<td>
            价格：&nbsp;<span class='<?php echo filterParaNumberByName("priceup")==""&&filterParaNumberByName("pricedown")==""?"org":"blu"?>'><a href="xq_fy_list.php?type=<?php echo $type?>&xqid=<?php echo $xq_rs["ID"]?>">不限</a></span> 
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
                        echo "<span class='".(filterParaNumberByName("priceup")==$rs1["UP"]&&filterParaNumberByName("pricedown")==$rs1["DOWN"]?"org":"blu")."'><a href='xq_fy_list.php?type=".$type."&xqid=".$xq_rs["ID"]."&pricedown=".$rs1["DOWN"]."&priceup=".$rs1["UP"]."'>".$rs1["MEMO"]."</a></span><span class='hui'>(".$rs["num"].")</span>&nbsp;";
                    }
                }
                
            ?>    
            </td>
        </tr>
      </table>
      </div>