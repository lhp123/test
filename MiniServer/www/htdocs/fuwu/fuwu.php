<?php
$pos="服务";
$posd="计算器";
?>
<?php 
include_once '../include.php';
include_once '../action/FwdkAction.php';
$action = filterParaByName("action");
if($action=="jsdk"){
    $fwdk = new Fwdk();
    echo $fwdk->init();
    return ;
}

include_once '../head.php';
?>
<style type="text/css">
  .display {
	display:none;
  }
  span.result{
	width: 190px;
    background: none;
    border: 0 none;
    color: #fe7b25;
    font-family: arial;
    height: 26px;
    line-height: 26px;
  }
  </style>

<div id="center">
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="/news/news.php">交易工具</a></span>&nbsp;>&nbsp;<span class="blu"><a href="javascript:void(0);">房贷计算器</a></span></div>


  <?php include_once 'fuwu_left.php';?>
  <div id="jjr_list">
  <div id="jjr_list_titi">
  	二手房房贷计算器
  </div>
  <div id="news_main">
	<div id="jsqtit"><strong>房贷计算器</strong><span style="color:#999999; padding-left:10px; font-size:12px;">(*号部分在页面下方有备注说明)</span></div>
     <div id="jsq_box1" class="left">

<form id="myform" action="" method="get">
  
     	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td><span class="org1">请您填写</span></td>
                <td> </td>
            </tr>
            <tr>
            	<td class="jsq_box1_td">还款方式：</td>
                <td class="jsq_box1_td"><input name="hkfs" type="radio" value="bx"  checked />等额本息* <input name="hkfs" type="radio" value="bj" />等额本金* </td>
            </tr>
            <tr>
            	<td class="jsq_box1_td">贷款类别：</td>
                <td class="jsq_box1_td">
                <select name="dktype">
                  <option value="sydk" selected >商业贷款</option>
                  <option value="gjj">公积金</option>
                  <option value="zuhe">组合型</option>
              </select>
              </td>
            </tr>
          <tr>
            	<td style="line-height:40px;">计算方式：</td>
                <td>
                	<input name="jstype" type="radio" value="mianji" checked />根据面积、单价计算<br />
                	<input name="jstype" type="radio" value="zonge" />根据贷款总额计算
                    
              </td>
          </tr>
            <tr>
           	  <td class="jsq_box1_td"> </td>
              <td class="jsq_box1_td jstype_mianji " >
                <table border="0" cellpadding="0" cellspacing="0" >
                    <tr>
                        	<td align="right">单位：</td>
                            <td><input name="danjia" type="text" size="8"  />元/平米</td>
                      </tr>
                     <tr>
                            <td align="right">面积：</td>
                            <td><input name="fyarea" type="text" size="8" />平方米</td>
                     </tr>       
                     <tr>
                            <td align="right">按揭成数：</td>
                            <td><select name="anjie" style="color: rgb(0, 0, 0);"> 
                                        <option value="9">9成</option> 
                                        <option value="8">8成</option> 
                                        <option value="7" selected>7成</option> 
                                        <option value="6">6成</option> 
                                        <option value="5">5成</option> 
                                        <option value="4">4成</option> 
                                        <option value="3">3成</option> 
                                        <option value="2">2成</option>                                              
                           </select></td>
                     </tr>
                </table>    
              </td>
               
              <td class="jsq_box1_td jstype_zonge display" >
                <table border="0" cellpadding="0" cellspacing="0" >
                    <tr>
                        	<td >贷款总额：</td>
                            <td><input name="total" type="text" size="10" maxlength="8"  onkeyup="" />万元</td>
                           
                      </tr>
                     
                </table>    
              </td>
			</tr>
			
			<tr class="display" >
				  
				  <td class="jsq_box1_td " >商业贷款：</td>
				  <td class="jsq_box1_td "><input name="total_sy" type="text" size="10" maxlength="8"   />万元</td>
			</tr>
			
			<tr class="display" >
               
                <td class="jsq_box1_td " >公&nbsp;积&nbsp;金：</td>
                <td class="jsq_box1_td "><input name="total_gjj" type="text" size="10" maxlength="8"   />万元</td>
            </tr>
            <tr>
            	<td class="jsq_box1_td">按揭年数：</td>
                <td class="jsq_box1_td">
                <select name="anjieyear">
					<option value="1">1年（12期）</option>
					<option value="2">2年（24期）</option>
					<option value="3">3年（36期）</option>
					<option value="4">4年（48期）</option>
					<option value="5">5年（60期）</option>
					<option value="6">6年（72期）</option>
					<option value="7">7年（84期）</option>
					<option value="8">8年（96期）</option>
					<option value="9">9年（108期）</option>
					<option value="10">10年（120期）</option>
					<option value="11">11年（132期）</option>
					<option value="12">12年（144期）</option>
					<option value="13">13年（156期）</option>
					<option value="14">14年（168期）</option>
					<option value="15">15年（180期）</option>
					<option value="16">16年（192期）</option>
					<option value="17">17年（204期）</option>
					<option value="18">18年（216期）</option>
					<option value="19">19年（228期）</option>
					<option value="20" selected>20年（240期）</option>
					<option value="25">25年（300期）</option>
					<option value="30">30年（360期）</option>
              </select>
              </td>
            </tr>
            <tr>
            	<td class="jsq_box1_td">贷款利率：</td>
                <td class="jsq_box1_td">
									<select name ="rate"> 
										<!-- option动态生成 -->
									</select>
              </td>
            </tr>
            <tr class="display">
            	<td class="jsq_box1_td ">公&nbsp;积&nbsp;金：</td>
                <td class="jsq_box1_td"><input type="text"  name="rate_gjj" style="width:50px;" />&nbsp;%</td>
            </tr>
            <tr>
            	<td class="jsq_box1_td">商&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业：</td>
                <td class="jsq_box1_td"><input type="text"  name="rate_sy" style="width:50px;" />&nbsp;%</td>
            </tr>
            
            <tr>
            	<td height="60" colspan="2" align="center" valign="middle">
            	<a href="#" id="submit"><img src="/images/ksjs.jpg" width="73" height="28" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<a href="#" id="reset"><img src="/images/cxtx.jpg" width="73" height="28" /></a></td>
            </tr>
        </table>
</form>
     </div>
     <div id="jsq_box2" class="left">
     	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
           	<td class="org1">查看结果</td>
            <td></td>
            <td></td>
                
          </tr>
        	<tr>
            	<td width="90" align="right" class="jsq_box1_td">房款总额：</td>
                <td class="jsq_box1_td" width="180"><span class="result"  id="result_fwprice"> </span></td>
                <td class="jsq_box1_td">元</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">贷款总额：</td>
                <td class="jsq_box1_td" width="180"><span class="result" id="result_dktotal"> </span></td>
                <td class="jsq_box1_td">元</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">还款总额：</td>
                <td class="jsq_box1_td" width="180"><span class="result"  id="result_total"> </span></td>
                <td class="jsq_box1_td">元</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">支付利息款：</td>
                <td class="jsq_box1_td" width="180"><span class="result" id="result_lx"> </span></td>
                <td class="jsq_box1_td">元</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">首期付款：</td>
                <td class="jsq_box1_td" width="180"><span class="result" id="result_monthfirst"> </span></td>
                <td class="jsq_box1_td">元</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">贷款月数：</td>
                <td class="jsq_box1_td" width="180"><span class="result" id="result_month"> </span></td>
                <td class="jsq_box1_td">月</td>
            </tr>
            <tr>
            	<td width="90" align="right" class="jsq_box1_td">月均还款：</td>
                <td class="jsq_box1_td hkfs_bx" width="180"><span class="result" id="result_monthmoney"> </span></td>
                <td class="jsq_box1_td hkfs_bx ">元</td>
                <td class="jsq_box1_td hkfs_bj display" colspan="2">
                    <span style="margin:10px;">
                        <textarea id="result_monthmoney2" rows="5" readonly style="border:1px #999 solid;width:190px;margin:10px 0 0 0;color: #FE7B25;"></textarea>
                    </span>
                </td>
                
            </tr>
            <tr>
           	  <td colspan="3" align="right" style="line-height:40px;">*以上结果仅供参考，实际应缴款以当地为准</td>
                
            </tr>
        </table>
     </div>
  </div>
  <div id="jsqsm">
  <dl>
  	<dt>*等额本息还款法：</dt>
    <dd>把按揭贷款的本金总额与利息总额相加，然后平均分摊到还款期限的每个月中。作为还款人，每个月还给银行固定金额，但每月还款额中的本金比重逐月递增，利息比重逐月递减。</dd>
    <dt>*等额本金还款法：</dt>
    <dd>将本金分摊到每个月内，同时付清上一交易日至本次还款日之间的利息。这种还款方式相对等额本息而言，总的利息支出较低，但是前期支付的本金和利息较多，还款负担逐月递减。</dd>
  	<dt class="org1">注：</dt>
    
    <dd class="org1" style="font-weight:normal;">1.
二手房的贷款年限受贷款客户的年龄及购买房屋的房龄影响。关于贷款额度、月供、利率等信息可以咨询<?php echo $COMPANYJXNAME?>门店经纪人。<br />
2.
北京公积金贷款最高额度受个人信用等级影响，个人信用等级AAA级最高额度为104万，AA级最高额度为92万，A级最高额度为80万。<br />
3.
对已贷款购买一套住房但人均面积低于当地平均水平，再申请购买第二套普通自住房的居民，比照执行首次贷款购买普通自住房的优惠政策。</dd>
  </dl>

  </div>
  </div>
</div>
<?php include_once '../tail.php';?>
