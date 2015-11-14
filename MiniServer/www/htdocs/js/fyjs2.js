//图片滚动列表 mengjia 070816
var Speed = 10; //速度(毫秒)
var Space = 10; //每次移动(px)
var PageWidth = 185; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;


function AutoPlay() { //自动滚动
    clearInterval(AutoPlayObj);
    AutoPlayObj = setInterval('ISL_GoDown1();ISL_StopDown1();', 10000); //间隔时间
}
function ISL_GoUp1() { //上翻开始
    if (MoveLock) return;
    clearInterval(AutoPlayObj);
    MoveLock = true;
    MoveTimeObj = setInterval('ISL_ScrUp1();', Speed);
}
function ISL_StopUp1() { //上翻停止
    clearInterval(MoveTimeObj);
    if (GetObj('ISL_Cont1').scrollLeft % PageWidth - fill != 0) {
        Comp = fill - (GetObj('ISL_Cont1').scrollLeft % PageWidth);
        CompScr1();
    } else {
        MoveLock = false;
    }
    AutoPlay();
}
function ISL_ScrUp1() { //上翻动作
    if (GetObj('ISL_Cont1').scrollLeft <= 0) {
        GetObj('ISL_Cont1').scrollLeft = GetObj

        ('ISL_Cont1').scrollLeft + GetObj('List3').offsetWidth
    }
    GetObj('ISL_Cont1').scrollLeft -= Space;
}
function ISL_GoDown1() { //下翻
    clearInterval(MoveTimeObj);
    if (MoveLock) return;
    clearInterval(AutoPlayObj);
    MoveLock = true;
    ISL_ScrDown1();
    MoveTimeObj = setInterval('ISL_ScrDown1()', Speed);
}
function ISL_StopDown1() { //下翻停止
    clearInterval(MoveTimeObj);
    if (GetObj('ISL_Cont1').scrollLeft % PageWidth - fill != 0) {
        Comp = PageWidth - GetObj('ISL_Cont1').scrollLeft % PageWidth + fill;
        CompScr1();
    } else {
        MoveLock = false;
    }
    AutoPlay();
}
function ISL_ScrDown1() { //下翻动作
    if (GetObj('ISL_Cont1').scrollLeft >= GetObj('List3').scrollWidth) {
        GetObj('ISL_Cont1').scrollLeft =

            GetObj('ISL_Cont1').scrollLeft - GetObj('List3').scrollWidth;
    }
    GetObj('ISL_Cont1').scrollLeft += Space;
}

function CompScr1() {
    var num;
    if (Comp == 0) {
        MoveLock = false;
        return;
    }
    if (Comp < 0) { //上翻
        if (Comp < -Space) {
            Comp += Space;
            num = Space;
        } else {
            num = -Comp;
            Comp = 0;
        }
        GetObj('ISL_Cont1').scrollLeft -= num;
        setTimeout('CompScr1()', Speed);
    } else { //下翻
        if (Comp > Space) {
            Comp -= Space;
            num = Space;
        } else {
            num = Comp;
            Comp = 0;
        }
        GetObj('ISL_Cont1').scrollLeft += num;
        setTimeout('CompScr1()', Speed);
    }
}


function GetObj(objName) {
    if (document.getElementById) {
        return eval('document.getElementById("' + objName + '")')
    } else {
        return eval

        ('document.all.' + objName)
    }
}

//GetObj("List4").innerHTML = GetObj("List3").innerHTML;
GetObj('ISL_Cont1').scrollLeft = fill;
GetObj("ISL_Cont1").onmouseover = function () {
    clearInterval(AutoPlayObj);
}
GetObj("ISL_Cont1").onmouseout = function () {
    AutoPlay();
}
AutoPlay();
