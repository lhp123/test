<?include_once 'INCLUDE.php'; ?>

<?

$MENU="wt";

$MPOS="wt";

include_once 'head.php'; 



$act=filterParaAllByName("act");

if($act=="save"){

	$t=filterParaAllByName("t");

	if($t=="cs"){
		$ADDRESS=get_gbk(filterParaByName("city")).get_gbk(filterParaByName("country")).get_gbk(filterParaByName("street")).get_gbk(filterParaByName("LINKST"));

		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,ADDRESS,DISNAME,AREA,H_SHI,H_TING,H_WEI,DIRECTION,PURPOS,PRICE,LINKTEL) values('".$CID."',sysdate(),'".get_gbk("出售")."','".get_gbk(filterParaByName("LINKNAME"))."','".$ADDRESS."','".get_gbk(filterParaByName("DISNAME"))."','".get_gbk(filterParaByName("AREA"))."','".get_gbk(filterParaByName("H_SHI"))."','".get_gbk(filterParaByName("H_TING"))."','".get_gbk(filterParaByName("H_WEI"))."','".get_gbk(filterParaByName("DIRECTION"))."','".get_gbk(filterParaByName("PURPOS"))."','".get_gbk(filterParaByName("PRICE"))."','".get_gbk(filterParaByName("LINKTEL"))."')";

		execute($sql);

		echo "<script>location.href='?s=1';</script>";

	}

	else if($t=="cz"){
						$ADDRESS=get_gbk(filterParaByName("city")).get_gbk(filterParaByName("country")).get_gbk(filterParaByName("street")).get_gbk(filterParaByName("LINKST"));		 		

        
		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,ADDRESS,LINKTEL) values('".$CID."',sysdate(),'".get_gbk("出租")."','".get_gbk(filterParaByName("LINKNAME"))."','".$ADDRESS."','".get_gbk(filterParaByName("DISNAME"))."','".get_gbk(filterParaByName("AREA"))."','".get_gbk(filterParaByName("H_SHI"))."','".get_gbk(filterParaByName("H_TING"))."','".get_gbk(filterParaByName("H_WEI"))."','".get_gbk(filterParaByName("DIRECTION"))."','".get_gbk(filterParaByName("PURPOS"))."','".get_gbk(filterParaByName("PRICE"))."','".get_gbk(filterParaByName("LINKTEL"))."')";


		execute($sql);

		echo "<script>location.href='?s=1';</script>";

	}

	else if($t=="qz"){

		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL) values('".$CID."',sysdate(),'".get_gbk("求租")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaByName("LINKTEL"))."')";

		execute($sql);

		echo "<script>location.href='?s=1';</script>";

	}

	else if($t=="qg"){

		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL) values('".$CID."',sysdate(),'".get_gbk("求购")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaByName("LINKTEL"))."')";

		execute($sql);
		echo get_gbk(filterParaByName("LINKNAME"));
		echo "<script>location.href='?s=1';</script>";

	}

}

?>



 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
<link href="netcss/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script> 

 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="js/GlobalProvinces_main.js"></script>
<script type="text/javascript" src="js/GlobalProvinces_extend1.js"></script>
<script type="text/javascript" src="js/initLocation.js"></script>


  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">

   <div class="L">

    <div>

     <div class="list_header_container">

      <div id="list_header">



       <div class="H"  id="topbar">

        <a class="back" id="prop_view_header" href="index.php"  data-id="" data-city="tj"> <span></span> <i></i> <span>首页</span> </a>
		<select style="border:1px none;background-color:#e8e8e8; font-size:1em;" onchange="javascript:search1(this.value)">
			<option value="3">
			<a href="#" class="search1" id="buy3" >出售</a>	</option>
			<option value="4">
			<a href="#" class="search2" id="buy4">出租</a> </option>
			<option value="1">
			<a href="#" class="search2" id="buy1" >求购</a>
			</option>
			<option value="2">
			<a href="#" class="search2" id="buy2">求租</a>
			</option>
		</select>

       </div>

       

       

      </div>

     </div>

     



     <div class="weituo2">

     <a href="#" class="search1" id="buy3" onclick="javascript:search1(3)"></a>

     <a href="#" class="search2" id="buy4" onclick="javascript:search1(4)"></a>

     <a href="#" class="search2" id="buy1" onclick="javascript:search1(1)"></a> 

     <a href="#" class="search2" id="buy2" onclick="javascript:search1(2)"></a>

     </div>

     <div style="text-align:center;">

     <?

     $msg=filterParaAllByName("s");

     if($msg=="1"){

     	//echo "提交成功！";
		echo "<script>alert('提交成功!')</script>";

     }

     ?></div>

      <form name="qgform" action="weituo.php?act=save&t=qg" method="post">

      <div class="drop" id="drop1">
	    <div class="jsqtr">
            <dl>
                <dt >称呼</dt>
                <dd>
                    <select id="LINKNAME" class="jsqinput09" name="LINKNAME">
			<option    class="weituo_border" style="height:30px;" />先生</option>
			<option   class="weituo_border" style="height:30px;"  />女士</option>
			</select>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>Call 我</dt>
                <dd>
                    <div class="mr5"><input type="number" name="LINKTEL" id="LINKTEL" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>
	  <div class="weituo_an"><img src="netimages/an.png" width="80%" onclick="check1();"/></div>

      </div>

      </form>

      <script type="text/javascript">
	  var re=/^1\d{10}$/;
		function check1(){

			if(qgform.LINKNAME.value==""){ 
				alert("请填写-称呼!"); 
				return ;
			}else if(qgform.LINKTEL.value==""){ 
				alert("请填写-联系方式!");  
				return ;
			}else if(!re.test(qgform.LINKTEL.value)){
				alert("请填写合法的手机号码!");  
				return ;

			}
			qgform.submit();
    
		}

	 </script>

      <form name="qzform" action="weituo.php?act=save&t=qz" method="post">

      <div class="drop" id="drop2" style="display:none;">

         <div class="jsqtr">
            <dl>
                <dt>称呼</dt>
                <dd>
                    <select id="LINKNAME" class="jsqinput09" name="LINKNAME">
			<option    class="weituo_border" style="height:30px;" />先生</option>
			<option   class="weituo_border" style="height:30px;"  />女士</option>
			</select>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>Call 我</dt>
                <dd>
                    <div class="mr5"><input type="number" name="LINKTEL" id="LINKTEL" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>

           <div class="weituo_an"><img src="netimages/an.png" width="80%" onclick="check2();"/></div>



      </div>

      </form>
	 <script type="text/javascript">
	 var re3=/^1\d{10}$/;
		function check2(){

			if(qzform.LINKNAME.value==""){ 
				alert("请填写-称呼!"); 
				return ;
			}else if(qzform.LINKTEL.value==""){ 
				alert("请填写-联系方式!");  
				return ;
			}
		else if(!re3.test(qzform.LINKTEL.value)){
				alert("请填写合法的手机号码!"); 
				alert(qzform.LINKTEL.value);
				return ;

			}
			qzform.submit();
    
		}

	 </script>

      <form name="csform" action="weituo.php?act=save&t=cs" method="post">
	<div id="drop3" class="drop">
	  <div class="jsqtr">
            <dl>
                <dt>称呼</dt>
                <dd>
                    <select id="LINKNAME" class="jsqinput09" name="LINKNAME">
			<option    class="weituo_border" style="height:30px;" />先生</option>
			<option   class="weituo_border" style="height:30px;"  />女士</option>
			</select>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>Call 我</dt>
                <dd>
                    <div class="mr5"><input type="number" name="LINKTEL" id="LINKTEL" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>
	<details>
	<summary>更多选择</summary>
	<div class="jsqtr">
            <dl>
                <dt>性质</dt>
                <dd>
                    <select id="PURPOS" class="jsqinput07" name="PURPOS">
			<option   class="weituo_border" style="height:30px;"  />住宅</option>
			<option  class="weituo_border" style="height:30px;"  />写字楼</option>
			<option   class="weituo_border" style="height:30px;"  />商铺</option>
			<option  class="weituo_border" style="height:30px;"  />厂房</option>
			<option   class="weituo_border" style="height:30px;"  />公寓</option>
			<option   class="weituo_border" style="height:30px;"  />别墅</option>

			</select> 
                </dd>
            </dl>
        </div>
	<div class="jsqtr">
            <dl>
                <dt>小区</dt>
                <dd>
                    <div class="mr5"><input type="text" name="DISNAME" id="DISNAME" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>面积</dt>
                <dd>
                    <div class="mr5"><input type="number" name="AREA" id="AREA" class="jsqinput01"  />&nbsp;平方&nbsp;</div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>户型</dt>
                <dd>
                    <select id="H_SHI" class="jsqinput08" name="H_SHI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;室&nbsp;
			 <select id="H_TING" class="jsqinput08" name="H_TING">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select>&nbsp;厅&nbsp;
			 <select id="H_WEI" class="jsqinput08" name="H_WEI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;卫
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>朝向</dt>
                <dd>
                    <select id="DIRECTION" class="jsqinput07" name="DIRECTION">
			<option   class="weituo_border" style="height:30px;"  />向东</option>
			<option  class="weituo_border" style="height:30px;"  />向西</option>
			<option   class="weituo_border" style="height:30px;"  />向南</option>
			<option  class="weituo_border" style="height:30px;"  />向北</option>
			<option   class="weituo_border" style="height:30px;"  />东南</option>
			<option   class="weituo_border" style="height:30px;"  />东西</option>
			<option   class="weituo_border" style="height:30px;"  />东北</option>
			<option   class="weituo_border" style="height:30px;"  />西北</option>
			<option   class="weituo_border" style="height:30px;"  />西南</option>

			</select> 
                </dd>
            </dl>
        </div>
		
		<div class="jsqtr">
            <dl>
                <dt>价格</dt>
                <dd>
                    <div class="mr5"><input type="number" name="PRICE" id="PRICE" class="jsqinput01"  />&nbsp;元&nbsp;</div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr02">
            <dl>
                <dt>地址</dt>
                <dd>
                    <select id="sheng" name="province" disabled="true" hidden="hidden" >
	  		 
					</select > 
					
					<select id="shi" name="city" class="jsqinput06">
					 
					</select > 市
					
					<select id="xian" name="country" class="jsqinput06">
				 
					</select> 县/区<br/>
					
					 <select id="xiang" name="street" class="jsqinput06" style="margin:10px auto;">
						 
					</select> 镇/街<br/>
					<div class="mr5"><input type="text" name="LINKST" id="LINKST" class="jsqinput03" style="margin:10px auto;" /></div>
                </dd>
            </dl>
        </div>

	
	


	</details>

<div class="weituo_an"><img src="netimages/an.png" width="80%" onclick="check3();"/></div>
	</div>
	
      </form>
	   <script type="text/javascript">
	   var re1=/^1\d{10}$/;
		function check3(){

			if(csform.LINKNAME.value==""){ 
				alert("请填写-称呼!"); 
				return ;
			}else if(csform.LINKTEL.value==""){ 
				alert("请填写-联系方式!");  
				return ;
			}else if(!re1.test(csform.LINKTEL.value)){
				alert("请填写合法的手机号码!");  
				return ;

			}
			csform.submit();
    
		}

	 </script>

      <form name="czform" action="weituo.php?act=save&t=cz" method="post">

     <div class="drop" id="drop4" style="display:none;"><div class="jsqtr">
            <dl>
                <dt>称呼</dt>
                <dd>
                    <select id="LINKNAME" class="jsqinput09" name="LINKNAME">
			<option    class="weituo_border" style="height:30px;" />先生</option>
			<option   class="weituo_border" style="height:30px;"  />女士</option>
			</select>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>Call 我</dt>
                <dd>
                    <div class="mr5"><input type="number" name="LINKTEL" id="LINKTEL" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>
	<details>
	<summary>更多选择</summary>
	<div class="jsqtr">
            <dl>
                <dt>性质</dt>
                <dd>
                    <select id="PURPOS" class="jsqinput07" name="PURPOS">
			<option   class="weituo_border" style="height:30px;"  />住宅</option>
			<option  class="weituo_border" style="height:30px;"  />写字楼</option>
			<option   class="weituo_border" style="height:30px;"  />商铺</option>
			<option  class="weituo_border" style="height:30px;"  />厂房</option>
			<option   class="weituo_border" style="height:30px;"  />公寓</option>
			<option   class="weituo_border" style="height:30px;"  />别墅</option>

			</select> 
                </dd>
            </dl>
        </div>
	<div class="jsqtr">
            <dl>
                <dt>小区</dt>
                <dd>
                    <div class="mr5"><input type="text" name="DISNAME" id="DISNAME" class="jsqinput03"  /></div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>面积</dt>
                <dd>
                    <div class="mr5"><input type="number" name="AREA" id="AREA" class="jsqinput01"  />&nbsp;平方&nbsp;</div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>户型</dt>
                <dd>
                    <select id="H_SHI" class="jsqinput07" name="H_SHI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;室&nbsp;
			 <select id="H_TING" class="jsqinput07" name="H_TING">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select>&nbsp;厅&nbsp;
			 <select id="H_WEI" class="jsqinput07" name="H_WEI">
			<option   class="weituo_border" style="height:30px;"  />0</option>
			<option   class="weituo_border" style="height:30px;"  />1</option>
			<option  class="weituo_border" style="height:30px;"  />2</option>
			<option   class="weituo_border" style="height:30px;"  />3</option>
			<option  class="weituo_border" style="height:30px;"  />4</option>
			<option   class="weituo_border" style="height:30px;"  />5</option>
			</select> &nbsp;卫&nbsp;
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>朝向</dt>
                <dd>
                    <select id="DIRECTION" class="jsqinput07" name="DIRECTION">
			<option   class="weituo_border" style="height:30px;"  />向东</option>
			<option  class="weituo_border" style="height:30px;"  />向西</option>
			<option   class="weituo_border" style="height:30px;"  />向南</option>
			<option  class="weituo_border" style="height:30px;"  />向北</option>
			<option   class="weituo_border" style="height:30px;"  />东南</option>
			<option   class="weituo_border" style="height:30px;"  />东西</option>
			<option   class="weituo_border" style="height:30px;"  />东北</option>
			<option   class="weituo_border" style="height:30px;"  />西北</option>
			<option   class="weituo_border" style="height:30px;"  />西南</option>
			</select> 
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>性质</dt>
                <dd>
                    <select id="PURPOS" class="jsqinput07" name="PURPOS">
			<option   class="weituo_border" style="height:30px;"  />住宅</option>
			<option  class="weituo_border" style="height:30px;"  />写字楼</option>
			<option   class="weituo_border" style="height:30px;"  />商铺</option>
			<option  class="weituo_border" style="height:30px;"  />厂房</option>
			<option   class="weituo_border" style="height:30px;"  />公寓</option>
			<option   class="weituo_border" style="height:30px;"  />别墅</option>

			</select> 
                </dd>
            </dl>
        </div>
		<div class="jsqtr">
            <dl>
                <dt>价格</dt>
                <dd>
                    <div class="mr5"><input type="number" name="PRICE" id="PRICE" class="jsqinput01"  />&nbsp;元&nbsp;</div>
                </dd>
            </dl>
        </div>
		<div class="jsqtr02">
            <dl>
                <dt>地址</dt>
                <dd>
                    <select id="sheng1" name="province" disabled="true" hidden="hidden" >
	  		 
					</select > 
					
					<select id="shi1" name="city" class="jsqinput06">
					 
					</select > 市
					
					<select id="xian1" name="country" class="jsqinput06">
				 
					</select> 县/区<br/>
					
					 <select id="xiang1" name="street" class="jsqinput06" style="margin:10px auto;">
						 
					</select> 镇/街<br/>
					<div class="mr5"><input type="text" name="LINKST" id="LINKST" class="jsqinput03" style="margin:10px auto;" /></div>
                </dd>
            </dl>
        </div>
	</details>


<div class="weituo_an"><img src="netimages/an.png" width="80%" onclick="check4();"/></div>



      </div>

     </form>
	 	<script type="text/javascript">
			$(function(){initLocation({sheng:"sheng",shi:"shi",xian:"xian",xiang:"xiang",sheng_val:"广东",shi_val:"广州",xian_val:"广州市",xiang_val:"--"});});
			$(function(){initLocation({sheng:"sheng1",shi:"shi1",xian:"xian1",xiang:"xiang1",sheng_val:"广东",shi_val:"广州",xian_val:"广州市",xiang_val:"--"});});
		</script>
	<script type="text/javascript">
	var re2=/^1\d{10}$/;
		function check4(){

			if(czform.LINKNAME.value==""){ 
				alert("请填写-称呼!"); 
				return ;
			}else if(czform.LINKTEL.value==""){ 
				alert("请填写-联系方式!");  
				return ;
			}else if(!re2.test(czform.LINKTEL.value)){
				alert("请填写合法的手机号码!");  
				return ;

			}
			czform.submit();
    
		}

	 </script>

     </div>

     </div>

    </div>

  <br/><br/><br/>

  

<!-- 

<div id="" class="userpeo" >TEST</div>

 -->





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

