<?php 
include 'include/tools.php';
$POS="detail";
$title="新闻管理";
$prefix = "news";
$page = $prefix."_detail.php";
$redirect_url = $prefix."_list.php";

include 'action/NewsAction.php';
$news = new NewsAction($conn,$CID);
$news->setUrl($redirect_url);
$rs = $news->control();

include_once 'head.php';
$news->setDeptJson();
$news->setXqJson1();
$news->setNewsJson();
?>

<script type="text/javascript">
function selectDis(){
	var type = document.getElementById("TYPE").value;
	var td  = document.getElementById("td");
	if(type =="业主谈小区"){
		td.style.display = "";
		$("#myform").getRe({
   		 re1: $("#RE1"),
         re2: $("#RE2")
        	});
		$("#DISNAME").getXq({
			did:$("#FK_DISID"),
			pid:$('#RE1'),
            ppid:$('#RE2'),
			json:xq});
	}else {
		td.style.display = "none";
	}
}



$(document).ready(function (){
	$("#TYPE").getNewsType({
		 subname: $("#SUBTYPE"),
		 newsjson:newstype
	});
		 
	selectDis();
	
});

</script>

<div id="main">
<?include 'menu.php';?>
  <div id="main_right">
  	 <?php echo_title1 ($title);?>
    
    <div id="main_right_main">
    <input  id ='json' type='hidden' value = "<?php echo $rs["js"]?>"/>
    
    <form id="myform" action="<?php echo $page?>?action=save" name="" method="post">
        <input id='sname' name='sname' type='hidden' value='' />
    	<input type="hidden" name="id" value="<?php echo $rs["ID"] ?>" />
    	<input type="hidden" name="CID" sname ='CID' value="<?php echo $CID ?>" />
    	
    	<table >
        	<tr>
            	<td >
                <table >
                	<tr>
                    	<td width="48%"> 
                    	            新闻标题：<input id="TITLE" name="TITLE" sname="TITLE" value="<?php echo $rs["TITLE"]?>" class="inputcss" type="text"  style="width:270px;" />
                    	 </td>
                        <td width="48%">
                                                                     新闻首页显示顺序: 
                              <input name="TABORDER_NEWSINDEX" sname="TABORDER_NEWSINDEX"  value="<?php echo $rs["TABORDER_NEWSINDEX"]?>" type="text"  class="inputcss" style="width:40px;" />
                              
                              
                        </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="48%" >
                        	        新闻来源：<input  name="SOURCE" sname="SOURCE" value="<?php echo $rs["SOURCE"]?>" class="inputcss" type="text"  />
                        	</td>
                            <td width="48%" >
                                                                        作者：<input  name="AUTHOR" sname="AUTHOR" value="<?php echo $rs["AUTHOR"]?>"  class="inputcss" type="text" style="width:113px;"  />
                                                                        
                            </td>
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                        	<td width="30%">
                        		新闻类型：<select  name="TYPE" sname="TYPE"   class="selectcss" selt="<?php echo $rs["TYPE"]?>" onchange = 'selectDis();'/>
                        		                <option value= '' >请选择新闻类型</option>
                        		</select>
                            </td>
                            <td width="30%">
                        		新闻子类型：<select name="SUBTYPE" sname="SUBTYPE"  selt="<?php echo $rs["SUBTYPE"]?>"  class="selectcss"  />
                        		                <option value= '' >请选择新闻子类型</option>
                        		</select>
                            </td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
            <tr>
            	<td >
                	<table >
                    	<tr>
                            <td id="td"  width="30%">
							关联小区：<select id="RE1" name="RE1" sname="RE1"  selt="<?php echo $rs["RE1"]?>"  class="selectcss"  style="width:80px;" onchange="clearxq()"/>

                        		                <option id='' value='' >请选择行政区</option>
                        		      </select>
									  <select id="RE2" name="RE2" sname="RE2"  selt="<?php echo $rs["RE2"]?>" class="selectcss" style="width:80px;" onchange="clearxqre()"/>
                        		             <option id='' value='' selected="selected">请选择片区</option>

                        		      </select>
                        		<input id="DISNAME" name="DISNAME" sname="DISNAME"   value = "<?php echo $rs["DISNAME"]?>" type="text" class="inputcss" />
                        		        <input id="FK_DISID" name="FK_DISID" sname="FK_DISID"   value = "<?php echo $rs["FK_DISID"]?>" type="hidden"  />
                            </td>
                           
                        </tr>
                    </table>
              </td>
            </tr>
           <tr>
           	  <td>
                	<table >
                    	<tr>
                       	  <td valign="top" nowrap >新闻内容：</td>
                          <td valign="middle" >
                               <textarea  name="CONTENT" stype='kindeditor' cols="" rows="" style="width:650px; height:300px;"><?php echo iconv("GBK","utf-8",$rs["CONTENT"])?></textarea>
                          </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td >
                	<table >
                          	<tr>
                            	<td nowrap >新闻照片：<input  name="IMAGE_PATH" sname="IMAGE_PATH" stype="upfile" updir="NEWS" value="<?php echo $rs["IMAGE_PATH"]?>" style="height:23px; width:300px; border:1px #7f9db9 solid;"  type="text" /></td>
                               
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