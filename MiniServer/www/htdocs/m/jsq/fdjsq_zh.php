<?include_once 'head_jsq.php'; ?>

<?
$MPOS="ly";
?>
<!-- tools/inc.header.html compiled file created on 2013-11-05 14:57:26 -->

<FORM id=calculateform method=post name=calculateform 
action=fdjsq_zh_result.php>
<DIV class=jsqtr>
<DL>
  <DT>还款方式 </DT>
  <DD>
  <DIV class=mr5>
  	<INPUT class=repay value=bx CHECKED type=radio name=repay><SPAN id=wz_bx>等额本息</SPAN>
  </DIV>
  <DIV><INPUT class=repay value=bj type=radio name=repay><SPAN id=wz_bj>等额本金</SPAN>
  </DIV>
  </DD></DL>
</DIV>

<DIV class=jsqtr>
<DL>
  <DT>公积金贷款总额 </DT>
  <DD>
  <DIV class=mr5><INPUT id=total_gjj class=jsqinput01 value="<?=$price?>" type=tel  name=total_gjj></DIV>
  <DIV>（万元）</DIV></DD></DL></DIV>
<DIV class=jsqtr>
<DL>
  <DT>商业贷款总额 </DT>
  <DD>
  <DIV class=mr5><INPUT id=total_sy class=jsqinput01 value=100 type=tel   name=total_sy></DIV>
  <DIV>（万元）</DIV></DD></DL></DIV>
<DIV class=jsqtr>
<DL>
  <DT>按揭年数 </DT>
  <DD><SELECT id=mortgage class=jsqinput04 name=mortgage> 
  		<OPTION label=1年（12期） value=1>1年（12期）</OPTION> 
  		<OPTION label=2年（24期） value=2>2年（24期）</OPTION> 
  		<OPTION label=3年（36期） value=3>3年（36期）</OPTION> 
  		
    <OPTION label=4年（48期） value=4>4年（48期）</OPTION> 
    <OPTION label=5年（60期） value=5>5年（60期）</OPTION> 
    <OPTION label=6年（72期） value=6>6年（72期）</OPTION> 
    <OPTION label=7年（84期） value=7>7年（84期）</OPTION> 
    <OPTION label=8年（96期） value=8>8年（96期）</OPTION> 
    <OPTION label=9年（108期） value=9>9年（108期）</OPTION> 
    <OPTION label=10年（120期） value=10>10年（120期）</OPTION> 
    <OPTION label=11年（132期） value=11>11年（132期）</OPTION> 
    <OPTION label=12年（144期） value=12>12年（144期）</OPTION> 
    <OPTION label=13年（156期） value=13>13年（156期）</OPTION> 
    <OPTION label=14年（168期） value=14>14年（168期）</OPTION> 
    <OPTION label=15年（180期） value=15>15年（180期）</OPTION> 
    <OPTION label=16年（192期） value=16>16年（192期）</OPTION> 
    <OPTION label=17年（204期） value=17>17年（204期）</OPTION> 
    <OPTION label=18年（216期） value=18>18年（216期）</OPTION> 
    <OPTION label=19年（228期） value=19>19年（228期）</OPTION> 
    <OPTION label=20年（240期） selected value=20>20年（240期）</OPTION> 
    <OPTION label=21年（252期） value=21>21年（252期）</OPTION> 
    <OPTION label=22年（264期） value=22>22年（264期）</OPTION> 
    <OPTION label=23年（276期） value=23>23年（276期）</OPTION> 
    <OPTION label=24年（288期） value=24>24年（288期）</OPTION> 
    <OPTION label=25年（300期） value=25>25年（300期）</OPTION> 
    <OPTION label=26年（312期） value=26>26年（312期）</OPTION> 
    <OPTION label=27年（324期） value=27>27年（324期）</OPTION> 
    <OPTION label=28年（336期） value=28>28年（336期）</OPTION> 
    <OPTION label=29年（348期） value=29>29年（348期）</OPTION> 
    <OPTION label=30年（360期） value=30>30年（360期）</OPTION>
  </SELECT> </DD></DL></DIV>
<DIV style="BORDER-BOTTOM-WIDTH: 0px" class=jsqtr>
<DL>
  <DT>公积金贷款利率 </DT>
  <DD>
  	<DIV class=mr2><INPUT id=rate_gjj class=jsqinput02 value=3.25 type=tel  name=rate_gjj></DIV>
  	<DIV style="FONT-SIZE: 14px">%</DIV>
  </DD>
</DL>
</DIV>

<DIV class=jsqtr>
<DL>
  <DT>商业贷款利率 </DT>
  <DD>
  <DIV class=mr5>
  			<SELECT id=pix_rate class=jsqinput05 name=pix_rate> 
                        <option value="3" label="基准利率上限（1.1倍）">基准利率上限（1.1倍）</option>
                        <option value="2" label="基准利率下限（85折）">基准利率下限（85折）</option>
                        <option value="1" label="基准利率下限（7折）">基准利率下限（7折）</option>
                        <option value="0" label="基准利率" selected="">基准利率</option>
                        <option value="4" label="自定义">自定义</option> 
  			</SELECT>
  </DIV>
  <DIV class=mr2><INPUT id=rate_sy class=jsqinput02 value='5.15' type=tel name=rate_sy></DIV>
  <DIV style="FONT-SIZE: 14px">%</DIV>
   <!-- 
  <A id=rateSet title=利率设置  href="javascript:void(0)">
  <DIV style="WIDTH: 33px; HEIGHT: 30px; MARGIN-LEFT: 10px"><IMG 
  src="netimages/shezhi.png" width=33 height=30> 
  </DIV>
  </A> 
  -->
  </DD></DL></DIV>

  
  
  <INPUT id=type value=3 type=hidden name=type> 
  <INPUT id=arr_para_sy value=Array type=hidden name=arr_para_sy> 
  <INPUT id=time_rates value=12年7月6日 type=hidden name=time_rates> 
 <INPUT type=hidden name=price id=price value=<?=$price?>>
  </FORM>
  
  <INPUT id=ratesId type=hidden name=ratesId> 
  <INPUT id=json_rates value='[
{&quot;name&quot;:null,&quot;data&quot;:{
&quot;1&quot;:{&quot;1&quot;:&quot;0.0500&quot;,&quot;3&quot;:&quot;0.0500&quot;,&quot;5&quot;:&quot;0.0500&quot;,&quot;30&quot;:&quot;0.0515&quot;},
&quot;2&quot;:{&quot;5&quot;:&quot;0.0275&quot;,&quot;30&quot;:&quot;0.0325&quot;}
}},
{&quot;name&quot;:null,&quot;id&quot;:&quot;70&quot;,&quot;data&quot;:{
&quot;1&quot;:{&quot;1&quot;:&quot;0.0350&quot;,&quot;3&quot;:&quot;0.0350&quot;,&quot;5&quot;:&quot;0.0350&quot;,&quot;30&quot;:&quot;0.0361&quot;},
&quot;2&quot;:{&quot;5&quot;:&quot;0.0193&quot;,&quot;30&quot;:&quot;0.0228&quot;}
}},
{&quot;name&quot;:null,&quot;id&quot;:&quot;71&quot;,&quot;data&quot;:{
&quot;1&quot;:{&quot;1&quot;:&quot;0.0425&quot;,&quot;3&quot;:&quot;0.0425&quot;,&quot;5&quot;:&quot;0.0425&quot;,&quot;30&quot;:&quot;0.0438&quot;},
&quot;2&quot;:{&quot;5&quot;:&quot;0.0234&quot;,&quot;30&quot;:&quot;0.0276&quot;}
}},
{&quot;name&quot;:null,&quot;id&quot;:&quot;72&quot;,&quot;data&quot;:{
&quot;1&quot;:{&quot;1&quot;:&quot;0.0550&quot;,&quot;3&quot;:&quot;0.0550&quot;,&quot;5&quot;:&quot;0.0550&quot;,&quot;30&quot;:&quot;0.0567&quot;},
&quot;2&quot;:{&quot;5&quot;:&quot;0.0303&quot;,&quot;30&quot;:&quot;0.0358&quot;}
}}
]'  type=hidden name=json_rates> 
	<DIV class=jsqbotton><A id=calculate href="javascript:void(0)"><INPUT value=开始计算 type=submit></A></DIV>
      <br/>
  <br/>

</ARTICLE>

<SCRIPT>
$('#pix_rate').change(function(){
    var ratesId =$(this).children('option:selected').val();
    var mortgage =$('#mortgage').children('option:selected').val();
    $('#ratesId').val(ratesId);
    var json_rates = $("#json_rates").val();
    var rates = eval('(' +$("#json_rates").val()+ ')');
    var cur_rate_sy = "";
    var cur_rate_gjj = "";
    for(var i = 0; i < rates.length ; i++)
    {
        if(ratesId == i)
        {
            if(mortgage == 1)
            {
                cur_rate_sy = rates[i]['data']['1']['1']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else if(mortgage == 2 || mortgage == 3)
            {
                cur_rate_sy = rates[i]['data']['1']['3']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else if(mortgage == 4 || mortgage == 5)
            {
                cur_rate_sy = rates[i]['data']['1']['30']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else
            {
                cur_rate_sy = rates[i]['data']['1']['30']*100;
                cur_rate_gjj = rates[i]['data']['2']['30']*100;
            }
        }
    }
    $('#rate_sy').val(cur_rate_sy.toFixed(2));
    $('#rate_gjj').val(cur_rate_gjj.toFixed(2));

    $('#rate_sy').focus();
});

$('#mortgage').change(function(){
    var mortgage =$(this).children('option:selected').val();
    var ratesId =$('#pix_rate').children('option:selected').val();
    $('#ratesId').val(ratesId);
    var json_rates = $("#json_rates").val();
    var rates = eval('(' +$("#json_rates").val()+ ')');
    var cur_rate_sy = "";
    var cur_rate_gjj = "";
    for(var i = 0; i < rates.length ; i++)
    {
        if(ratesId == i)
        {
            if(mortgage == 1)
            {
                cur_rate_sy = rates[i]['data']['1']['1']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else if(mortgage == 2 || mortgage == 3)
            {
                cur_rate_sy = rates[i]['data']['1']['3']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else if(mortgage == 4 || mortgage == 5)
            {
                cur_rate_sy = rates[i]['data']['1']['5']*100;
                cur_rate_gjj = rates[i]['data']['2']['5']*100;
            }
            else
            {
                cur_rate_sy = rates[i]['data']['1']['30']*100;
                cur_rate_gjj = rates[i]['data']['2']['30']*100;
            }
        }
    }
    $('#rate_sy').val(cur_rate_sy.toFixed(2));
    $('#rate_gjj').val(cur_rate_gjj.toFixed(2));

});
$('#total_gjj').click(function(){
    $('#total_gjj').val('');
});
$('#total_sy').click(function(){
    $('#total_sy').val('');
});
$('#calculate').click(function(){
    var total_gjj = $('#total_gjj').val();
    if(total_gjj == "")
    {
        alert('请输入您公积金贷款总额');
        return false;
    }
    if(total_gjj > 10000)
    {
        alert('贷款总额太大，请升级计算器');
        return false;
    }
    

    var total_sy = $('#total_sy').val();
    if(total_sy == "")
    {
        alert('请输入您商业贷款总额');
        return false;
    }
    if(total_sy > 10000)
    {
        alert('贷款总额太大，请升级计算器');
        return false;
    }
    
    var rate_gjj = $('#rate_gjj').val();
    if(rate_gjj == "")
    {
        alert('请输入您贷款利率');
        return false;
    }
    if(rate_gjj > 100)
    {
        alert('利率太高,请升级计算器');
        return false;
    }
    
    var rate_sy= $('#rate_sy').val();
    if(rate_sy == "")
    {
        alert('请输入您商业贷款利率');
        return false;
    }
    if(rate_sy > 100)
    {
        alert('利率太高,请升级计算器');
        return false;
    }
    
    $("#calculateform").submit();
});
//$('#rateSet').click(function(){
//    var ratesId = $("#ratesId").val();
//    var type= $('#type').val();
//    var total_gjj = $('#total_gjj').val();
//    var arr_para_sy  = "total_gjj=" + total_gjj;
//    var total_sy = $('#total_sy').val();
//    arr_para_sy = arr_para_sy + "@@" + "total_sy=" + total_sy;
//    var rate_gjj = $('#rate_gjj').val();
//    arr_para_sy = arr_para_sy + "@@" + "rate_gjj=" + rate_gjj;
//    var rate_sy = $('#rate_sy').val();
//    arr_para_sy = arr_para_sy + "@@" + "rate_sy=" + rate_sy;
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
</SCRIPT>


<?include_once 'tail_jsq.php'; ?>