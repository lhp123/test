<?php 
include 'include/tools.php';
$POS="detail";
$title = "个人信息";
$prefix = "person";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_detail.php";

include 'action/PersonAction.php';
$person = new PersonAction($conn,$CID);
$action = filterParaByName("action");
if($action ==""){
    $rs = $person->add();
}elseif($action == "save"){    
    $person->setUrl($redirect_url);
    return $person->save();
}elseif($action == "checkLoginName"){
    echo  $person->checkLoginName();
    return ;
}


include_once 'head.php';

$person->setDeptJson();
$person->setPtJson("SCYW","擅长业务");

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
		   $.post("?action=checkLoginName", {'loginname':$(this).val()},
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
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $CID ?>" />
    	<input type="hidden" id="updir" value="FY" />
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td>
                <table >
                	<tr>
                    	<td width="40%">
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
                    	
                    	<td width="40%">
                	                年&nbsp;&nbsp;&nbsp;&nbsp;龄：<input id="AGE" name="AGE" sname="AGE"  value="<?php echo $rs["AGE"]?>" class="inputcss" type="text" style="width: 160px;"  />
                	    </td>
                    	<td >
                	                电&nbsp;&nbsp;&nbsp;&nbsp;话：<input id="TEL" name="TEL" sname="TEL"  value="<?php echo $rs["TEL"]?>" class="inputcss" type="text" style="width: 160px;"  />
                	    </td>
                    </tr>
                    <tr>
                    	<td width="40%" >
                	                公司名称：<input id="SCGS" name="SCGS" sname="SCGS"  value="<?php echo $rs["SCGS"]?>" class="inputcss" type="text" style="width: 160px;"  />
                	    </td>
                        <td >
                                                                        邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<input id="EMAIL" name="EMAIL" sname="EMAIL" value="<?php echo $rs["EMAIL"]?>" class="inputcss" type="text" style="width:160px;" />
                        </td>
                    </tr>
                    <tr>
                    	<td colspan=2>
                	                公司地点：<input id="GZDD" name="GZDD" sname="GZDD"  value="<?php echo $rs["GZDD"]?>" class="inputcss" type="text" style="width: 320px;"  />
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
                    	  头&nbsp;&nbsp;&nbsp;&nbsp;像：<input name="PHOTO" sname="PHOTO" value ="<?php echo $rs["PHOTO"]?>"  stype="upfile" updir="USER" class="inputcss" type="text" readonly />    
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>         
          
      </table>
      <div id="fy" style="text-align:center;">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
      	<tr>
        	<td valign="middle">
        	<?php if(ifHasPriL2("1GRXX_2GRXX_3XG")){?>
        	    <input id="submit" value="<?php echo $rs["ID"]==""?"提交":"修改"?>" type="submit"  />
        	    <input  value="重置" type="reset" />
        	    <!-- 
        	     <input  value="返回列表" type="button" onclick = "window.history.back();"/>
        	     -->
        	 <?php }?>
        	</td>
        </tr>
      </table>
       </form>	
    </div>  
  
    </div>
  </div>
  </div>
<?include 'tail.php';?>