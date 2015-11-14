<?php 
include 'include/tools.php';
$POS="detail";
$title="员工管理";
$prefix = "staff";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";


include 'action/StaffAction.php';
$staff = new StaffAction($conn,$CID);
$action = filterParaByName("action");
$staff->setUrl($redirect_url);
$rs = $staff->control();
if($action == "checkLoginName"){
    echo  $staff->checkLoginName();
    return ;
}


include 'head.php';
$staff->setDeptJson();
$staff->setPtJson("SCYW","擅长业务");


?>


<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
<script type="text/javascript">
    $(document).ready(function(){
    	$("#myform").getRe({
   		 re1: $("#RE1"),
         re1id: $("#RE1ID"),
         re2: $("#RE2"),
        	});
        $("#SCYW").getPt({json:SCYW,title:"选择擅长业务"});

        $("#LOGINNAME").keyup(function (){
    	    $(this).parents("td").find(".error").empty();
    	    $(this).parents("td").find(".yes").empty();
    	 }).blur(function (){
    		  var _this = $(this);
    		   $.post("?action=checkLoginName", {'loginname':$(this).val(),'id':$("#id").val()},
    				   function(data){
    			         //alert(data);
    			         var resp = eval("("+data+")");
    			         var flag = resp.flag;
    			         if(flag=="1"){
    			        	 _this.siblings(".error").remove();
    			        	 _this.siblings(".yes").remove();
    			        	 _this.closest("td").append("<font style='font-size: 10;color: red;' class='error'>登录名重复!</font>");
    				    }else if(flag=="2"){
    				    	 _this.siblings(".error").remove();
    				    	 _this.siblings(".yes").remove();
    				    	 _this.closest("td").append("<font style='font-size: 10;color: red;' class='yes'>登录名可以使用</font>");
    					}
    				 });
    		   });
    	$("#submit").click(function () {
    		  if($(".error").length=="0"){
    			  $(this).submit();
    			}
    	   });
        
      });
   
    </script>                   	
    <div id="main_right_main">
    <input  id ='json' type='hidden' value = "<?php echo $rs["js"]?>"/>
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id"  id="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $CID ?>" />
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td>
                <table >
                	<tr>
                    	<td >
                    	        用户姓名：<input id="USERNAME" name="USERNAME" sname="USERNAME" value="<?php echo $rs["USERNAME"]?>" class="inputcss" type="text" style="width: 160px;" />
                    	</td>
                    	<td > 
                    	        登&nbsp;陆&nbsp;名：<input id="LOGINNAME" name="LOGINNAME" sname="LOGINNAME" value="<?php echo $rs["LOGINNAME"]?>" class="inputcss" type="text"  style="width: 160px;" />
                    	</td>
                    	<td rowspan="5">
                        	       <img show="PHOTO" alt="用户头像" src="<?php echo $rs["PHOTO"]?>" width="150px" height="200px">
                        </td> 
                    </tr>
                    <tr>
                    	
                    	<td > 
                    	        性&nbsp;&nbsp;&nbsp;&nbsp;别：<select id="SEX" name="SEX" sname="SEX"   class="selectcss" >
                    	          <option value = "男" <?php echo $rs[SEX]=="男"?"selected":""?>>男</option>
                    	          <option value = "女" <?php echo $rs[SEX]=="女"?"selected":""?>>女</option>
                    	      </select>
                    	</td>
                    	<td width="40%">
                	                电&nbsp;&nbsp;&nbsp;&nbsp;话：<input id="TEL" name="TEL" sname="TEL"  value="<?php echo $rs["TEL"]?>" class="inputcss" type="text" style="width: 160px;"  />
                	    </td>
                    </tr>
                    <tr>
                     <td nowrap>
                	            &nbsp;&nbsp;Q&nbsp;&nbsp;Q&nbsp;&nbsp;：<input id="QQ" name="QQ" sname="QQ" value="<?php echo $rs["QQ"]?>" class="inputcss" type="text" style="width:160px;"  />
                	    </td>
                        <td >
                                                                        邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<input id="EMAIL" name="EMAIL" sname="EMAIL" value="<?php echo $rs["EMAIL"]?>" class="inputcss" type="text" style="width:160px;" />
                        </td>
                    </tr>
                    <tr>
                        <td >
                                                                     所在部门：<select id="FK_DEPTID" name="FK_DEPTID" sname="FK_DEPTID"   class="selectcss" >
                        		                <option other='' value='' >请选择部门</option>
                                		    <?php 
                                		        $stmt = mysql_query("SELECT ID,DEPTNAME FROM XT_DEPT WHERE CID = '".$CID."'",$conn);
                                		        while ($rs_TYPE = mysql_fetch_array($stmt)){
                                                     echo "<option  value='".$rs_TYPE ["ID"]."'".($rs_TYPE["ID"]==$rs["FK_DEPTID"]?"selected":"").">".$rs_TYPE['DEPTNAME']."</option>";   
                                                }
                                		    ?>
                        		</select>
                    	</td>
                    	<td >
                    	          服务商圈：<select id="RE1" name="RE1" sname="RE1"  selt="<?php echo $rs["RE1"]?>"  class="selectcss"  />
                            		                <option id='' value='' >请选择行政区</option>
                            		  </select>
                            		<select id="RE2" name="RE2" sname="RE2"  selt="<?php echo $rs["RE2"]?>" class="selectcss" />
                            		     <option id='' value='' >请选择片区</option>
                            		</select>
                        	        <input type="hidden" id="RE1ID" name="RE1ID" sname="RE1ID" value="<?php echo $rs["RE1ID"]?>" />
                    	</td>
                    </tr>
                    <tr><td nowrap  colspan="2">
                	                        擅长业务：<input id="SCYW" name="SCYW" sname="SCYW" type ="text" value ="<?php echo $rs["SCYW"]?>"  style="width:350px;" />
                        </td>
                    </tr>
                </table>
              </td>
              
             </tr>
              <tr>
            	<td >
                <table >
                	<tr>
                    	<td > 
                    	 &nbsp;&nbsp;头&nbsp;&nbsp;像：<input name="PHOTO" sname="PHOTO" value ="<?php echo $rs["PHOTO"]?>"  stype="upfile" updir="USER" class="inputcss" type="text" />    
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                		<td > 
                    	       熟悉商圈：<input id="FWSQ" name="FWSQ" sname="FWSQ" value="<?php echo $rs["FWSQ"]?>" class="inputcss" type="text"   />&nbsp;&nbsp;注:服务商圈请用英文;隔开
                    	</td>
                    	<td > 
                    	        主攻小区：<input id="ZGXQ" name="ZGXQ" sname="ZGXQ" value="<?php echo $rs["ZGXQ"]?>" class="inputcss" type="text"  />&nbsp;&nbsp;注:主攻小区请用英文;隔开
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                		<td > 
                    	       店铺标语：<input id="DP_BANNER" name="DP_BANNER" sname="DP_BANNER" value="<?php echo $rs["DP_BANNER"]?>" class="inputcss" type="text" style="width:350px;"   />
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
           
             <tr>
            	<td >
                <table >
                	<tr>
                    	<td > 
                    	 用户角色：<select name="PRI" sname="PRI" class="selectcss">
                    	 				<option value="" >选择用户角色</option>
                    	 				<?php 
                    	 					$arr = $role->getRoleByType();
                    	 					foreach($arr as $val){
										?>
                    	 						<option value="<?php echo $val;?>" <?php echo $val==$rs["PRI"]?"selected":"";?>><?php echo $val;?></option>
                    	 				<?php } ?>
                    	 		</select>    
                    	&nbsp;&nbsp;显示顺序：<input name="TABORDER" sname="TABORDER"  value="<?php echo $rs["TABORDER"];?>" type="text" class="inputcss" style="width:30px;"/>
                    	&nbsp;&nbsp;<input name="IF_TJ" sname="IF_TJ" value="<?php echo $rs["IF_TJ"];?>" <?php echo $rs["IF_TJ"]>0?"checked":"";?> type="checkbox"/>最佳经纪人 
                    	&nbsp;&nbsp;<input name="IF_SHOW" sname="IF_SHOW" value="<?php echo $rs["IF_SHOW"];?>" <?php echo $rs["IF_SHOW"]>0?"checked":"";?> type="checkbox"/>显示 
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                <table >
                	<tr>
                    	<td nowrap>自我介绍：</td>
                    	<td><textarea id="MEMO" name="MEMO"  stype='kindeditor' cols="" rows="" style="width:650px; height:150px;"><?php echo $rs["MEMO"]?></textarea></td>
                    </tr>
                </table>
              </td>
            </tr>
            
          
      </table>
      <div id="fy" style="text-align:center;">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
      	<tr>
        	<td valign="middle">
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	    <input  value="返回列表" type="button" onclick = "window.history.back();"/>
        	</td>
        </tr>
      </table>
       </form>	
    </div>  
  
    </div>
  </div>
  </div>
<?include 'tail.php';?>