<?php 
include 'include/tools.php';
$POS="detail";
$title = "修改密码";
$prefix = "pwd";
$page = "pwd.php";
$redirect_url = "login.php";
include_once 'action/PwdAction.php';
$action = filterParaByName("action");
$wt = new PwdAction($conn,$CID);
if($action=="check"){
    echo $wt->check();
    return ;
}elseif ($action=="pwd"){
    echo  $wt->pwd();
    return ;
}

include_once 'head.php';
?>

<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
   <script type="text/javascript">
   $(document).ready(function (){
	  
	   $("#myform #old_pass,#myform #r_pass").keyup(function (){
		    $(this).parents("td").siblings("td").empty();
		  }).blur(function (){
			  if($("#r_pass").val()==""){
				  $("#r_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>新密码不能为空!</font>");
				  return;
			  }
			   $.post("?action=check", $("#myform").serialize(),
					   function(data){
				         //alert(data);
				         var resp = eval("("+data+")");
				         var flag = resp.flag;
				         if(flag=="1"){
				        	    $("#old_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>原密码错误!</font>");
					    }else if(flag=="2"){
					            $("#r_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>两次密码不一致!</font>");
						}
					 });
			   });
	   $("#myform #new_pass").keyup(function (){
		    $(this).parents("td").siblings("td").empty();
		  }).blur(function (){
			  if($("#new_pass").val()==""){
				  $("#new_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>新密码不能为空!</font>");
			  }
			   });	
	   
	   $("#submit").click(function () {
			  if($(".error").length=="0"){
				  $.post("?action=pwd", $("#myform").serialize(),
						   function(data){
					         var resp = eval("("+data+")");
					         var flag = resp.flag;
					         if(flag=="1"){
					        	    $("#old_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>原密码错误!</font>");
						    }else if(flag=="2"){
						            $("#r_pass").parents("td").siblings("td").empty().append("<font style='font-size: 10;color: red;' class='error'>两次密码不一致!</font>");
							}else if(flag=="3"){
							    alert("密码修改成功!请重新登录");
							    window.location.href="?loginout=1";
								}
						     
						   });
				}
			   
			    
		   });
});
	   
	   
  
   </script> 
    <div id="main_right_main">
    <input  id ='json' type='hidden' value = "<?php echo $rs["js"]?>"/>
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
    	<table  width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%" align="center"> 
                    	                        原密码：<input id="old_pass" name="old_pass"   class="inputcss" type="password"   /></td> 
                    	 <td  width="48%">
                    	         
                    	</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="48%" align="center">
                        	        新密码：<input id="new_pass" name="new_pass"   class="inputcss" type="password"    /></td>
                        	        
                        	 <td  width="48%">
                        	    
                        	</td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td  width="48%" align="center">
                        	        确&nbsp;&nbsp;认：<input id="r_pass" name="r_pass"  class="inputcss" type="password"   />
                        	 </td>
                        	<td  width="48%"> 
                        	    
                        	</td>
                        </tr>
                    </table>
              </td>
            </tr>
      </table>
      <div id="fy" style="text-align:center;">
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
      	<tr>
      		<?php if(ifHasPriL2("1GRXX_2XGMM_3XG")){?>
        	<td valign="middle" align="center" width="48%"><input id="submit" value="修改密码" type="button"  style="background-color: Transparent; color:#FFF;  background-image:url(images/sub1.png); width:86px; height:30px; line-height:30px; margin-top:8px; border:0px; " onmouseover="this.style.backgroundImage='url(images/sub2.png)'" onmouseout="this.style.backgroundImage='url(images/sub1.png)'" /></td>
            <?php }?>
            <td width="48%"></td>
        </tr>
      </table>
       </form>	
    </div>  
   
      
      
    </div>
  </div>
  </div>
<?include 'tail.php';?>