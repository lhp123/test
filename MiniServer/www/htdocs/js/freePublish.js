/**
 * Created by Administrator on 14-11-21.
 */
function buy() {
    $(".buy_div").show();
    $(".sell_div").hide();
    $(".rent_div").hide();
    $(".wanted_div").hide();
    $("#buy_li").css({"border-top": "1px solid #0180B5", "border-bottom": "none", "border-left": "1px solid #0180B5", "border-right": "1px solid #0180B5"});
    $("#sell_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
    $("#rent_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
    $("#wanted_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
}
function sell() {
    $(".buy_div").hide();
    $(".sell_div").show();
    $(".rent_div").hide();
    $(".wanted_div").hide();
    $("#buy_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-left": "none", "border-right": "none"});
    $("#sell_li").css({"border-top": "1px solid #0180B5", "border-bottom": "none", "border-right": "1px solid #0180B5", "border-left": "1px solid #0180B5"});
    $("#rent_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
    $("#wanted_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
}
function rent() {
    $(".buy_div").hide();
    $(".sell_div").hide();
    $(".rent_div").show();
    $(".wanted_div").hide();
    $("#buy_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-left": "none", "border-right": "none"});
    $("#sell_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-left": "none", "border-right": "none"});
    $("#rent_li").css({"border-top": "1px solid #0180B5", "border-bottom": "none", "border-left": "1px solid #0180B5", "border-right": "1px solid #0180B5"});
    $("#wanted_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
}
function wanted() {
    $(".buy_div").hide();
    $(".sell_div").hide();
    $(".rent_div").hide();
    $(".wanted_div").show();
    $("#buy_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-left": "none", "border-right": "none"});
    $("#sell_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
    $("#rent_li").css({"border-top": "none", "border-bottom": "1px solid #0180B5", "border-right": "none", "border-left": "none"});
    $("#wanted_li").css({"border-top": "1px solid #0180B5", "border-bottom": "none", "border-right": "1px solid #0180B5", "border-left": "1px solid #0180B5"});
}
/**
 * 手机号码验证
 */
$(document).ready(function () {
    $(".sell_div").hide();
    $(".rent_div").hide();
    $(".wanted_div").hide();
    $(".LINKTEL1").blur(function () {
        var mobileNum = $(".LINKTEL1").val();
        if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(mobileNum))) {
            alert("请输入正确的联系电话！");           
            return false;
        }
    });
    $(".LINKTEL2").blur(function () {
        var mobileNum = $(".LINKTEL2").val();
        if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(mobileNum))) {
            alert("请输入正确的联系电话！");
            return false;
        }
    });
    $(".LINKTEL3").blur(function () {
        var mobileNum = $(".LINKTEL3").val();
        if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(mobileNum))) {
            alert("请输入正确的联系电话！");
            return false;
        }
    });
    $(".LINKTEL4").blur(function () {
        var mobileNum = $(".LINKTEL4").val();
        if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(mobileNum))) {
            alert("请输入正确的联系电话！");
            return false;
        }
    });
});