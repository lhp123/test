<?include_once 'head_jsq.php'; ?>

<!--计算器 begin-->
<div class="ipad_left" style=" height:600px;border-right-width: 1px; border-right-style: solid; border-right-color: #999;">
    <div class="ipad_left_menu">
      <ul>
        <li class="ipad_left_menu1"><div class="menu_tb"><img src="../netimages/ipad1.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad1.png',sizingMethod='image'); " /> <div class="menu_name">二手房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad2.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad2.png',sizingMethod='image'); " /> <div class="menu_name">租房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad3.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad3.png',sizingMethod='image'); " /> <div class="menu_name">小区</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad4.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad4.png',sizingMethod='image'); " /> <div class="menu_name">新房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad5.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad5.png',sizingMethod='image'); " /> <div class="menu_name">经纪人</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad6.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad6.png',sizingMethod='image'); " /> <div class="menu_name">委托</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad7.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad7.png',sizingMethod='image'); " /> <div class="menu_name">关于</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad8.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad8.png',sizingMethod='image'); " /> <div class="menu_name">地图</div></div></li>
        <li><input type="text" name="textfield3" style="width:55%; float:left; margin-top:10px; margin-left:20px; height:22px; border:1px solid #ccc;"><input name="button" type="submit" class="search" id="button" value="查询"  style="width:25%; float:left; margin-top:10px; margin-left:10px; background-color:#28a2a7; border:0; height:25px; color:#FFF;"/></li>
      </ul>
    </div>
   </div>
<article id="waptool_B02_05" class="jsqmain" style="width:74%; float:right;">
<?
$jmenu="sy";
include_once 'menu_jsq.php'; 
?>
    <form method="post" action="fdjsq_sy_result.php" name="calculateform" id="calculateform">
        <div class="jsqtr">
            <dl>
                <dt>还款方式</dt>
                <dd>
                    <div class="mr5"><input name="repay" class="repay" type="radio" value="bx" checked="checked"><span id="wz_bx">等额本息</span></div>
                    <div><input name="repay" class="repay" type="radio" value="bj"><span id="wz_bj">等额本金</span></div>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>贷款总额</dt>
                <dd>
                    <div class="mr5"><input type="tel" class="jsqinput01" id="total" name="total" value="100"></div>
                    <div>（万元）</div>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>按揭年数</dt>
                <dd>
                    <select name="mortgage" id="mortgage" class="jsqinput04">
                        <option label="1年（12期）" value="1">1年（12期）</option>
<option label="2年（24期）" value="2">2年（24期）</option>
<option label="3年（36期）" value="3">3年（36期）</option>
<option label="4年（48期）" value="4">4年（48期）</option>
<option label="5年（60期）" value="5">5年（60期）</option>
<option label="6年（72期）" value="6">6年（72期）</option>
<option label="7年（84期）" value="7">7年（84期）</option>
<option label="8年（96期）" value="8">8年（96期）</option>
<option label="9年（108期）" value="9">9年（108期）</option>
<option label="10年（120期）" value="10">10年（120期）</option>
<option label="11年（132期）" value="11">11年（132期）</option>
<option label="12年（144期）" value="12">12年（144期）</option>
<option label="13年（156期）" value="13">13年（156期）</option>
<option label="14年（168期）" value="14">14年（168期）</option>
<option label="15年（180期）" value="15">15年（180期）</option>
<option label="16年（192期）" value="16">16年（192期）</option>
<option label="17年（204期）" value="17">17年（204期）</option>
<option label="18年（216期）" value="18">18年（216期）</option>
<option label="19年（228期）" value="19">19年（228期）</option>
<option label="20年（240期）" value="20" selected="selected">20年（240期）</option>
<option label="21年（252期）" value="21">21年（252期）</option>
<option label="22年（264期）" value="22">22年（264期）</option>
<option label="23年（276期）" value="23">23年（276期）</option>
<option label="24年（288期）" value="24">24年（288期）</option>
<option label="25年（300期）" value="25">25年（300期）</option>
<option label="26年（312期）" value="26">26年（312期）</option>
<option label="27年（324期）" value="27">27年（324期）</option>
<option label="28年（336期）" value="28">28年（336期）</option>
<option label="29年（348期）" value="29">29年（348期）</option>
<option label="30年（360期）" value="30">30年（360期）</option>

                    </select>
                </dd>
            </dl>
        </div>
        <div class="jsqtr">
            <dl>
                <dt>贷款利率</dt>
                <dd>
                    <div class="mr5">
                        <select name="pix_rate" id="pix_rate" class="jsqinput05">
                                                        <option value="0" label="基准利率" selected="">基准利率</option>
                                                        <option value="1" label="优惠30%">优惠30%</option>
                                                        <option value="2" label="优惠15%">优惠15%</option>
                                                        <option value="3" label="上浮10%">上浮10%</option>
                                                        <option value="4" label="自定义">自定义</option>
                                                    </select>
                    </div>
                    <div class="mr2"><input type="tel" class="jsqinput02" id="rate" name="rate" value="6.55"></div>
                    <div style="font-size:14px;">%</div>
                    <!--<a href="javascript:void(0)" id="rateSet" title="利率设置"><div style="width:33px;height:30px;margin-left:10px;"> <img src="netimages/shezhi.png" width="33" height="30"> </div></a>
                         -->
                </dd>
            </dl>
        </div>
        <input type="hidden" name="type" id="type" value="1">
        <input type="hidden" name="arr_para_sy" id="arr_para_sy" value="">
        <input type="hidden" name="time_rates" id="time_rates" value="12年7月6日">
    </form>
    <input type="hidden" name="ratesId" id="ratesId" value="">
    <input type="hidden" name="json_rates" id="json_rates" value="[{&quot;name&quot;:null,&quot;id&quot;:&quot;70&quot;,&quot;data&quot;:{&quot;1&quot;:{&quot;1&quot;:&quot;0.0560&quot;,&quot;3&quot;:&quot;0.0600&quot;,&quot;5&quot;:&quot;0.0600&quot;,&quot;30&quot;:&quot;0.0615&quot;},&quot;2&quot;:{&quot;5&quot;:&quot;0.0400&quot;,&quot;30&quot;:&quot;0.0450&quot;}}},

{&quot;name&quot;:null,&quot;id&quot;:&quot;71&quot;,&quot;data&quot;:{&quot;1&quot;:{&quot;1&quot;:&quot;0.042&quot;,&quot;3&quot;:&quot;0.04200&quot;,&quot;5&quot;:&quot;0.0420&quot;,&quot;30&quot;:&quot;0.04310&quot;},&quot;2&quot;:{&quot;5&quot;:&quot;0.0400&quot;,&quot;30&quot;:&quot;0.0450&quot;}}},

{&quot;name&quot;:null,&quot;id&quot;:&quot;72&quot;,&quot;data&quot;:{&quot;1&quot;:{&quot;1&quot;:&quot;0.051&quot;,&quot;3&quot;:&quot;0.051&quot;,&quot;5&quot;:&quot;0.051&quot;,&quot;30&quot;:&quot;0.0523&quot;},&quot;2&quot;:{&quot;5&quot;:&quot;0.0400&quot;,&quot;30&quot;:&quot;0.0450&quot;}}},

{&quot;name&quot;:null,&quot;id&quot;:&quot;73&quot;,&quot;data&quot;:{&quot;1&quot;:{&quot;1&quot;:&quot;0.066&quot;,&quot;3&quot;:&quot;0.066&quot;,&quot;5&quot;:&quot;0.066&quot;,&quot;30&quot;:&quot;0.0677&quot;},&quot;2&quot;:{&quot;5&quot;:&quot;0.0400&quot;,&quot;30&quot;:&quot;0.0450&quot;}}},{&quot;name&quot;:null,&quot;data&quot;:{&quot;1&quot;:{&quot;1&quot;:&quot;0.0600&quot;,&quot;3&quot;:&quot;0.0615&quot;,&quot;5&quot;:&quot;0.0640&quot;,&quot;30&quot;:&quot;0.0655&quot;},&quot;2&quot;:{&quot;5&quot;:&quot;0.0400&quot;,&quot;30&quot;:&quot;0.0450&quot;}}}]">
    <div class="jsqbotton"><a href="javascript:void(0)" id="calculate"><input type="submit" value="开始计算" class="input"></a></div>
</article>
<!--计算器 end-->

<script>
$('#pix_rate').change(function(){
    var ratesId =$(this).children('option:selected').val();
    var mortgage =$('#mortgage').children('option:selected').val();
    $('#ratesId').val(ratesId);
    var json_rates = $("#json_rates").val();
    var rates = eval('(' +$("#json_rates").val()+ ')');
    var cur_rate = "";
    for(var i = 0; i < rates.length ; i++)
    {
        if(ratesId == i)
        {
            if(mortgage == 1)
            {
                cur_rate = rates[i]['data']['1']['1']*100;
            }
            else if(mortgage == 2 || mortgage == 3)
            {
                cur_rate = rates[i]['data']['1']['3']*100;
            }
            else if(mortgage == 4 || mortgage == 5)
            {
                cur_rate = rates[i]['data']['1']['5']*100;
            }
            else
            {
                cur_rate = rates[i]['data']['1']['30']*100;
            }
        }
    }
    $('#rate').val(cur_rate.toFixed(2));
    $('#rate').focus();
});

$('#mortgage').change(function(){
    var mortgage =$(this).children('option:selected').val();
    var ratesId =$('#pix_rate').children('option:selected').val();
    $('#ratesId').val(ratesId);
    var json_rates = $("#json_rates").val();
    var rates = eval('(' +$("#json_rates").val()+ ')');
    var cur_rate = "";
    for(var i = 0; i < rates.length ; i++)
    {
        if(ratesId == i)
        {
            if(mortgage == 1)
            {
                cur_rate = rates[i]['data']['1']['1']*100;
            }
            else if(mortgage == 2 || mortgage == 3)
            {
                cur_rate = rates[i]['data']['1']['3']*100;
            }
            else if(mortgage == 4 || mortgage == 5)
            {
                cur_rate = rates[i]['data']['1']['5']*100;
            }
            else
            {
                cur_rate = rates[i]['data']['1']['30']*100;
            }
        }
    }
    $('#rate').val(cur_rate.toFixed(2));
});
$('#total').click(function(){
    $('#total').val('');
});
$('#calculate').click(function(){
    var total = $('#total').val();
    if(total == "")
    {
        alert('请输入您贷款总额');
        return false;
    }
    if(total>10000)
    {
        alert('贷款总额太大，请升级计算器');
        return false;
    }
    var arr_para_sy  = "total="+total;
    var rate = $('#rate').val();
    if(rate == "")
    {
        alert('请输入您贷款利率');
        return false;
    }
    if(rate>100)
    {
        alert('利率太高,请升级计算器');
        return false;
    }
    arr_para_sy = arr_para_sy + "@@" + "rate=" + rate;
    var repay = $('input[name=repay][checked]').val(); 
    arr_para_sy = arr_para_sy + "@@" + "repay=" + repay;
    var mortgage =$('#mortgage').children('option:selected').val();
    arr_para_sy = arr_para_sy + "@@" + "mortgage=" + mortgage;
    var pix_rate =$('#pix_rate').children('option:selected').val();
    arr_para_sy = arr_para_sy + "@@" + "pix_rate=" + pix_rate;
    $('#arr_para_sy').val(arr_para_sy);
    $("#calculateform").submit();
});

//$('#rateSet').click(function(){
//    var ratesId = $("#ratesId").val();
//    var type= $('#type').val();
//    var total = $('#total').val();
//    var arr_para_sy  = "total="+total;
//    var rate = $('#rate').val();
//    arr_para_sy = arr_para_sy + "@@" + "rate=" + rate;
//    var repay = $('input[name=repay][checked]').val(); 
//    arr_para_sy = arr_para_sy + "@@" + "repay=" + repay;
//    var mortgage =$('#mortgage').children('option:selected').val();
//    arr_para_sy = arr_para_sy + "@@" + "mortgage=" + mortgage;
//    var pix_rate =$('#pix_rate').children('option:selected').val();
//    arr_para_sy = arr_para_sy + "@@" + "pix_rate=" + pix_rate;
//    var time_rates = $('#time_rates').val();
//    arr_para_sy = arr_para_sy + "@@" + "time_rates=" + time_rates;
//    $('#arr_para_sy').val(arr_para_sy);
//    var url = "?c=tools&a=rateSetting&type="+type+"&ratesId="+encodeURIComponent(arr_para_sy)+"&r="+Math.random();
//    location.href =  url; 
//});

$('.repay').click(function(){
    if($('input[name=repay][checked]').val() == 'bx')
    {
        $("input[name='repay'][value='bx']").attr("checked",false); 
        $("input[name='repay'][value='bj']").attr("checked",true);
    }
    else if($('input[name=repay][checked]').val() == 'bj')
    {
        $("input[name='repay'][value='bj']").attr("checked",false); 
        $("input[name='repay'][value='bx']").attr("checked",true);
    }
});

$('#wz_bx').click(function(){
	 $("input[name='repay'][value='bj']").attr("checked",false); 
     $("input[name='repay'][value='bx']").attr("checked",true);
});
$('#wz_bj').click(function(){
	$("input[name='repay'][value='bx']").attr("checked",false); 
    $("input[name='repay'][value='bj']").attr("checked",true);
});
</script>



<?include_once 'tail_jsq.php'; ?>