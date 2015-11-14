<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-11-21
 * Time: 上午9:01
 */
$pos = '客户需求';
include_once 'head.php';

$conn=mysql_connect(DB_IP, DB_USERNAME, DB_PASSWORD);

mysql_select_db(DB_DATABASE);


$now =date('Y-m-d',time());

if ($_GET['name'] == 'buy') {
    $LINKNAME = $_POST['LINKNAME'];
    $LINKTEL = $_POST['LINKTEL'];
    $MEMO = $_POST['MEMO'];
    $CID = $_POST['CID'];
    $IP = get_client_ip();


    $sql = "insert into WT_XQ (LINKNAME,LINKTEL,MEMO,WTDATE,TYPE,CID,IP)
                    values('" . $LINKNAME . "','" . $LINKTEL . "','" . $MEMO . "','" . $now . "','买房','" . $CID . "','" . $IP . "')";



    $rs=mysql_query($sql,$conn);


    echo "<script language=javascript>alert('买房信息添加成功！！');</script>";


} elseif ($_GET['name'] == 'sell') {
    $IP = get_client_ip();
    $sql = "insert into WT_FY (IP,CID,LINKNAME,LINKTEL,RE1,DISNAME,ADDRESS,PURPOSE,DIRECTION,H_SHI,H_TING,H_WEI,AREA,PRICE,JZ_YEAR,TYPE,FITMENT,WTDATE,MEMO)
                    values('" . $IP . "','" . $_POST['CID'] . "','" . $_POST['LINKNAME'] . "','" . $_POST['LINKTEL'] . "','" . $_POST['RE1'] . "','" . $_POST['DISNAME'] . "','" . $_POST['ADDRESS'] . "','" . $_POST['PURPOSE'] . "','" . $_POST['DIRECTION'] . "','" . $_POST['H_SHI'] . "','" . $_POST['H_TING'] . "','" . $_POST['H_WEI'] . "','" . $_POST['AREA'] . "','" . $_POST['PRICE'] . "','" . $_POST['JZ_YEAR'] . "','卖房','" . $_POST['FITMENT'] . "','" . $now . "','" . $_POST['MEMO'] . "')";

   mysql_query($sql,$conn);
    echo "<script language=javascript>alert('卖房信息添加成功！');</script>";
} elseif ($_GET['name'] == 'rent') {
    $IP = get_client_ip();
    $sql = "insert into WT_FY (IP,CID,LINKNAME,LINKTEL,RE1,DISNAME,ADDRESS,PURPOSE,DIRECTION,H_SHI,H_TING,H_WEI,AREA,PRICE,JZ_YEAR,TYPE,FITMENT,WTDATE,MEMO)
                    values('" . $IP . "','" . $_POST['CID'] . "','" . $_POST['LINKNAME'] . "','" . $_POST['LINKTEL'] . "','" . $_POST['RE1'] . "','" . $_POST['DISNAME'] . "','" . $_POST['ADDRESS'] . "','" . $_POST['PURPOSE'] . "','" . $_POST['DIRECTION'] . "','" . $_POST['H_SHI'] . "','" . $_POST['H_TING'] . "','" . $_POST['H_WEI'] . "','" . $_POST['AREA'] . "','" . $_POST['PRICE'] . "','" . $_POST['JZ_YEAR'] . "','出租','" . $_POST['FITMENT'] . "','" . $now . "','" . $_POST['MEMO'] . "')";
   

    mysql_query($sql,$conn);
    echo "<script language=javascript>alert('出租信息添加成功！');</script>";
} elseif ($_GET['name'] == 'wanted') {
    $LINKNAME = $_POST['LINKNAME'];
    $LINKTEL = $_POST['LINKTEL'];
    $MEMO = $_POST['MEMO'];
    $CID = $_POST['CID'];
    $IP = get_client_ip();
    $sql = "insert into WT_XQ (CID,LINKNAME,LINKTEL,MEMO,WTDATE,TYPE,IP)
                    values('" . $CID . "','" . $LINKNAME . "','" . $LINKTEL . "','" . $MEMO . "','" . $now . "','求租','" . $IP . "')";
  

   mysql_query($sql,$conn);
    echo "<script language=javascript>alert('求租信息添加成功！');</script>";
}



//获取本机的IP地址
function get_client_ip()
{
    if ($_SERVER['REMOTE_ADDR']) {
        $cip = $_SERVER['REMOTE_ADDR'];
    } elseif (getenv("REMOTE_ADDR")) {
        $cip = getenv("REMOTE_ADDR");
    } elseif (getenv("HTTP_CLIENT_IP")) {
        $cip = getenv("HTTP_CLIENT_IP");
    } else {
        $cip = "unknown";
    }
    return $cip;
}

?>
    <link href="css/freepublish.css" rel="stylesheet">
    <script src="js/jquery-1.9.0.min.js"></script>
    <script src="js/freePublish.js"></script>
    <div class="main_div">
    <div class="top_div">
        网上<span style="color: orangered">委托</span>
    </div>
    <div class="nav_div">
        <ul>
            <li id="buy_li" STYLE="border-bottom: none;border-right: none"><a href="#" onclick="buy()">我要买房</a></li>
            <li id="sell_li" style="border-right: none;border-top: none"><a href="#" onclick="sell()">我要卖房</a></li>
            <li id="rent_li" style="border-right: none;border-top: none;border-left: none"><a href="#"
                                                                                              onclick="rent()">我要出租</a>
            </li>
            <li id="wanted_li" style=";border-top: none;border-left: none;border-right: none"><a href="#"
                                                                                                 onclick="wanted()">我要求租</a>
            </li>
        </ul>
    </div>
    <!--买房登记表-->
    <div class="buy_div">
        <div class="buy_title_div">买房登记表</div>
        <div class="buy_content_div">
            <form id="buy_form" name="buy_form" action="registe.php?name=buy" method="post">
                <div class="buy_main_content_div">
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>联系人:</td>
                            <td><input required oninvalid="setCustomValidity('请填写联系人！');"
                                       oninput="setCustomValidity('');" type="text" id="LINKNAME" name="LINKNAME"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="color: red">*</span>联系电话:
                            </td>
                            <td><input class="LINKTEL1" required oninvalid="setCustomValidity('请填写联系方式！');"
                                       oninput="setCustomValidity('');" type="tel" name="LINKTEL"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>备&nbsp;&nbsp;注:</td>
                            <td><textarea style="resize: none" name="MEMO" cols="66" rows="8"></textarea></td>
                        </tr>
                    </table>
                    <input type="hidden" name="CID" value="<?php echo $CID; ?>">
                </div>
                <div class="button_div">
                    <input type="submit" onclick="buy_ok()" value="确认提交">
                    <input type="reset" value="重新填写">
                </div>
            </form>
        </div>
    </div>
    <!--卖房登记表-->
    <div class="sell_div">
        <div class="sell_title_div">卖房登记表</div>
        <div class="sell_content_div">
            <form action="registe.php?name=sell" method="post">
                <div class="sell_main_content_div">
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>联系人:</td>
                            <td><input required oninvalid="setCustomValidity('请填写联系人！');"
                                       oninput="setCustomValidity('');" type="text" name="LINKNAME"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="color: red">*</span>联系电话:
                            </td>
                            <td><input class="LINKTEL2" required oninvalid="setCustomValidity('请填写联系方式！');"
                                       oninput="setCustomValidity('');" type="tel" name="LINKTEL"></td>
                        </tr>
                        <tr>
                            <td>区&nbsp;&nbsp;域:</td>
                            <td><input type="text" name="RE1"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小&nbsp;&nbsp;区:</td>
                            <td><input type="text" name="DISNAME"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>地&nbsp;&nbsp;址:</td>
                            <td><input size="62" required oninvalid="setCustomValidity('请填写地址！');"
                                       oninput="setCustomValidity('');" type="text" name="ADDRESS"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>性&nbsp;&nbsp;质:</td>
                            <td>
                                <select name="PURPOSE">
                                    <option>--请选择--</option>
                                    <option>住宅</option>
                                    <option>写字楼</option>
                                    <option>商铺</option>
                                    <option>厂房</option>
                                    <option>公寓</option>
                                    <option>别墅</option>
                                </select>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;朝&nbsp;&nbsp;向:</td>
                            <td>
                                <select name="DIRECTION">
                                    <option>--请选择--</option>
                                    <option>向东</option>
                                    <option>向西</option>
                                    <option>向南</option>
                                    <option>向北</option>
                                    <option>东南</option>
                                    <option>东西</option>
                                    <option>东北</option>
                                    <option>西北</option>
                                    <option>西南</option>
                                    <option>金角</option>
                                    <option>银角</option>
                                    <option>铜角</option>
                                    <option>铁角</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>户&nbsp;&nbsp;型：</td>
                            <td>
                                <select name="H_SHI">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                室
                            </td>
                            <td>
                                <select name="H_TING">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                厅
                            </td>
                            <td>
                                <select name="H_WEI">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                卫
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: red">*</span>面&nbsp;&nbsp;积:</td>
                            <td><input required oninvalid="setCustomValidity('请填写面积！');"
                                       oninput="setCustomValidity('');"
                                       onkeyup="value=value.replace(/[^\d]/g,'') "
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                       type="text" name="AREA">平米
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span>售&nbsp;&nbsp;价:</td>
                            <td><input required oninvalid="setCustomValidity('请填写售价！');"
                                       oninput="setCustomValidity('');" onkeyup="value=value.replace(/[^\d]/g,'') "
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                       type="text" name="PRICE">元/套
                            </td>
                        </tr>
                        <tr>
                            <td>建筑年代:</td>
                            <td><input type="text" name="JZ_YEAR"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span>装修情况:</td>
                            <td><input required oninvalid="setCustomValidity('请填写装修情况！');"
                                       oninput="setCustomValidity('');" type="text" name="FITMENT"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>备&nbsp;&nbsp;注:</td>
                            <td><textarea style="resize: none" name="MEMO" cols="63" rows="8"></textarea></td>
                        </tr>
                    </table>
                    <input type="hidden" name="CID" value="<?php echo $CID; ?>">
                </div>
                <div class="button_div">
                    <input type="submit" value="确认提交">
                    <input type="reset" value="重新填写">
                </div>
            </form>
        </div>
    </div>
    <!--出租登记表-->
    <div class="rent_div">
        <div class="rent_title_div">出租登记表</div>
        <div class="rent_content_div">
            <form action="registe.php?name=rent" method="post">
                <div class="rent_main_content_div">
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>联系人:</td>
                            <td><input required oninvalid="setCustomValidity('请填写联系人！');"
                                       oninput="setCustomValidity('');" type="text" name="LINKNAME"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="color: red">*</span>联系电话:
                            </td>
                            <td><input class="LINKTEL3" required oninvalid="setCustomValidity('请填写联系方式！');"
                                       oninput="setCustomValidity('');" type="tel" name="LINKTEL"></td>
                        </tr>
                        <tr>
                            <td>区&nbsp;&nbsp;域:</td>
                            <td><input type="text" name="RE1"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小&nbsp;&nbsp;区:</td>
                            <td><input type="text" name="DISNAME"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>地&nbsp;&nbsp;址:</td>
                            <td><input size="62" required oninvalid="setCustomValidity('请填写地址！');"
                                       oninput="setCustomValidity('');" type="text" name="ADDRESS"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>性&nbsp;&nbsp;质:</td>
                            <td>
                                <select name="PURPOSE">
                                    <option>--请选择--</option>
                                    <option>住宅</option>
                                    <option>写字楼</option>
                                    <option>商铺</option>
                                    <option>厂房</option>
                                    <option>公寓</option>
                                    <option>别墅</option>
                                </select>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;朝&nbsp;&nbsp;向:</td>
                            <td>
                                <select name="DIRECTION">
                                    <option>--请选择--</option>
                                    <option>向东</option>
                                    <option>向西</option>
                                    <option>向南</option>
                                    <option>向北</option>
                                    <option>东南</option>
                                    <option>东西</option>
                                    <option>东北</option>
                                    <option>西北</option>
                                    <option>西南</option>
                                    <option>金角</option>
                                    <option>银角</option>
                                    <option>铜角</option>
                                    <option>铁角</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>户&nbsp;&nbsp;型：</td>
                            <td>
                                <select name="H_SHI">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                室
                            </td>
                            <td>
                                <select name="H_TING">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                厅
                            </td>
                            <td>
                                <select name="H_WEI">
                                    <option>不限</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                卫
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: red">*</span>面&nbsp;&nbsp;积:</td>
                            <td><input required oninvalid="setCustomValidity('请填写面积！');"
                                       oninput="setCustomValidity('');" onkeyup="value=value.replace(/[^\d]/g,'') "
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                       type="text" name="AREA">平米
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span>租&nbsp;&nbsp;价:</td>
                            <td><input required oninvalid="setCustomValidity('请填写租价！');"
                                       oninput="setCustomValidity('');" onkeyup="value=value.replace(/[^\d]/g,'') "
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                       type="text" name="PRICE">元/月
                            </td>
                        </tr>
                        <tr>
                            <td>建筑年代:</td>
                            <td><input type="text" name="JZ_YEAR"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span>装修情况:</td>
                            <td><input required oninvalid="setCustomValidity('请填写装修情况！');"
                                       oninput="setCustomValidity('');" type="text" name="FITMENT"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>备&nbsp;&nbsp;注:</td>
                            <td><textarea style="resize: none" cols="63" rows="8" name="MEMO"></textarea></td>
                        </tr>
                    </table>
                    <input type="hidden" name="CID" value="<?php echo $CID; ?>">
                </div>
                <div class="button_div">
                    <input type="submit" value="确认提交">
                    <input type="reset" value="重新填写">
                </div>
            </form>
        </div>
    </div>
    <!--求租登记表-->
    <div class="wanted_div">
        <div class="wanted_title_div">求租登记表</div>
        <div class="wanted_content_div">
            <form action="registe.php?name=wanted" method="post">
                <div class="want_main_content_div">
                    <table>
                        <tr>
                            <td><span style="color: red">*</span>联系人:</td>
                            <td><input required oninvalid="setCustomValidity('请填写联系人！');"
                                       oninput="setCustomValidity('');" type="text" name="LINKNAME"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="color: red">*</span>联系电话:
                            </td>
                            <td><input class="LINKTEL4" required oninvalid="setCustomValidity('请填写联系方式！');"
                                       oninput="setCustomValidity('');" type="tel" name="LINKTEL"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>备&nbsp;&nbsp;注:</td>
                            <td><textarea style="resize: none" name="MEMO" cols="66" rows="8"></textarea></td>
                        </tr>
                    </table>
                    <input type="hidden" name="CID" value="<?php echo $CID; ?>">
                </div>
                <div class="button_div">
                    <input type="submit" value="确认提交">
                    <input type="reset" value="重新填写">
                </div>
            </form>
        </div>
    </div>
    </div>
<?php
include_once 'tail.php';
?>