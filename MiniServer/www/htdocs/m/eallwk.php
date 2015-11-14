<?php
define("TOKEN", "EALLWK");
$wechatObj= new wechatCallbackapiTest();
//$wechatObj->valid();  
$wechatObj->responseMsg();
class wechatCallbackapiTest {
	public function valid() {
		$echoStr= $_GET["echostr"];
		if($this->checkSignature()) {
			echo $echoStr;
			exit;
		}
	}
	public function vpost($url) {
		$ch= curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$result= curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	public function checkMobile($mobilephone) {
		if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/", $mobilephone)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function responseMsg() {
		$postStr= $GLOBALS["HTTP_RAW_POST_DATA"];
		$cid= "";
		$postObj= simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		$fromUsername= $postObj->FromUserName;
		$toUsername= $postObj->ToUserName;
		$keyword= trim($postObj->Content);
		$Event= trim($postObj->Event);
		$PicUrl= trim($postObj->PicUrl);
		$time= time();
		$msgType= "text";
		$text= "<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[%s]]></MsgType><Content><![CDATA[%s]]></Content>
																																		<FuncFlag>0</FuncFlag>
																																		</xml>";
		if($keyword == "微信号") {
			$resultStr= sprintf($text, $fromUsername, $toUsername, $time, $msgType, $toUsername);
			echo $resultStr;
			return;
		}
		
		$company= array(array('gh_d92118d4a74c' => '9;易遨演示'), //天津屋满多  9;易遨电信演示
		array('gh_d92118d4a74c' => '9;易遨演示') //天津屋满多
		);
		$info= "";
		for($i= 0, $n= count($company); $i < $n; $i++) {
			if(key($company[$i]) == $toUsername) {
				$info= current($company[$i]);
				continue;
			}
		}
		if($info == "") {
			return;
		}
		$cm= explode(";", $info);
		$cname= $cm[1];
		$cid= $cm[0];
		//数据库操作
		global $conn;
		$conn=mysql_connect("hdm-076.hichina.com","hdm0760074","eallcnzja801") or die("不能连接数据库服务器： ".mysql_error());
		mysql_select_db("hdm0760074_db",$conn) or die ("不能选择数据库: ".mysql_error());
		mysql_query("set names 'gbk'");
		$tname="WX_TEST";
		$sql="select * from ".$tname." where WX='".$cid.$fromUsername."'";
		$stmt=mysql_query($sql,$conn);
		$id="";
		if($rs = mysql_fetch_array ( $stmt )){
			$id=$rs["ID"];
		}
		
		//屋满多http://60.28.246.112:8016
		//电信智控http://apdx.fboos.com:8003
		$url="http://apwt.fboos2.com:8016/servlet/apple.weixin.";
		$user=$url."user?cid=".$cid."&wx=".$cid.$fromUsername."&r=".$randnum;
		$fy=$url."fy?cid=".$cid."&wx=".$cid.$fromUsername."&r=".$randnum;
		$xq=$url."xq?cid=".$cid."&wx=".$cid.$fromUsername."&r=".$randnum;
		$erpurl= "http://60.28.246.112:8016/servlet/apple.lw.weixin?cid=".$cid."&wx=".$fromUsername."&r=".$randnum;
		$tmpstr= "欢迎使用".$cname."微信帐号！";
		$tmpstr .= "\r\n输入您的手机号，进行帐户绑定，可以享受到更多服务！";
		$noBangding="客户帐户未绑定，无法享受此服务";
		if($Event == "CLICK") {
			$EventKey= trim($postObj->EventKey);
			$contentStr= $EventKey;
			if($EventKey == "房源委托") {
				if($id==""||$rs["TYPE"]!="kehu"){
					$contentStr=$noBangding;
				}
				else{
					$contentStr= $this->vpost($fy."&action=weituo&khid=".$rs["KHID"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
					$a=json_decode($contentStr,true);
					if($a["NUM"]=="0"){
						$contentStr="系统未找到您所委托的房源";
					}
					else if($a["NUM"]=="1"){
						$sql="update ".$tname." set FYID='".$a["FYID"]."',FYIDS='' where ID=".$id;
						mysql_query($sql,$conn);
						$contentStr=$a["INFO"];
					}
					else{
						$sql="update ".$tname." set FYID='',FYIDS='".$a["IDS"]."' where ID=".$id;
						mysql_query($sql,$conn);
						$contentStr=$a["INFO"];	
					}
					$contentStr=str_replace("<br>","\r\n",$contentStr);
				}
			}
			elseif($EventKey == "上传我的图片") {
				$contentStr= $this->vpost($erpurl."&action=YZ_UPIMG");
				$contentStr= iconv('gb2312', 'utf-8', $contentStr);
			}
			elseif($EventKey == "房源带看") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr= $this->vpost($fy."&action=daikan&fyid=".$rs["FYID"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			elseif($EventKey == "钥匙记录") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr= $this->vpost($fy."&action=key&fyid=".$rs["FYID"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			elseif($EventKey == "修改房源委托") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr="输入“ft委托内容”将直接给您的置业顾问发生消息，置业顾问将第一时间联系您";;
				}
			}
			elseif($EventKey == "业主自评") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr="输入“zp自评内容”将直接给您的置业顾问发生消息，系统将留存您的自评内容";;
				}
			}			
			
			elseif($EventKey == "需求委托") {
				if($id==""||$rs["TYPE"]!="kehu"){
					$contentStr=$noBangding;
				}
				else{
					$contentStr= $this->vpost($xq."&action=weituo&khid=".$rs["KHID"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
					$a=json_decode($contentStr,true);
					if($a["NUM"]=="0"){
						$sql="update ".$tname." set XQIDS='' where ID=".$id;
						mysql_query($sql,$conn);
						$contentStr="系统未找到您所委托的需求";
					}
					else{
						$sql="update ".$tname." set XQIDS='".$a["IDS"]."' where ID=".$id;
						mysql_query($sql,$conn);
						$contentStr=$a["INFO"];	
					}
					$contentStr=str_replace("<br>","\r\n",$contentStr);
				}
			}
			elseif($EventKey == "需求带看") {
				if($rs["XQIDS"]==""){
					$contentStr="请先定位您的需求信息";
				}
				else{
					$contentStr= $this->vpost($xq."&action=daikan&ids=".$rs["XQIDS"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			elseif($EventKey == "我的推荐") {
				if($rs["XQIDS"]==""){
					$contentStr="请先定位您的需求信息";
				}
				else{
					$contentStr= $this->vpost($xq."&action=tuijian&ids=".$rs["XQIDS"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			elseif($EventKey == "修改需求委托") {
				if($rs["XQIDS"]==""){
					$contentStr="请先定位您的需求信息";
				}
				else{
					$contentStr="输入“xt委托内容”将直接给您的置业顾问发生消息，置业顾问将第一时间联系您";;
				}
			}
			elseif($EventKey == "经纪人认证") {
				if($id!=""){
					if($rs["IF_OK"]==1){
						$contentStr="您的帐户已经认证过";
					}
					else{
						$contentStr="您的帐户已注册，请发送验证码认证";
					}
				}
				else{
					$contentStr= "回复经纪人+您的手机号，进行帐户绑定,如回复:经纪人1300000000";
				}
				
			}
			elseif($EventKey == "上传房源照片") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$sql="update ".$tname." set YZDATE=now() where ID=".$id;
					mysql_query($sql,$conn);
					$contentStr="上传房屋图片服务已启动,时效30分钟!直接回复图片内容即可上传！";
				}
			}
			elseif($EventKey == "服务评价") {
				if($id==""||$rs["TYPE"]!="kehu"){
					$contentStr=$noBangding;
				}
				else{
					$contentStr="输入“pj评价内容”将直接给您的置业顾问发送消息，系统将留存您的评价内容";;
				}
			}
			elseif($EventKey == "交易进度") {
				if($id==""||$rs["TYPE"]!="kehu"){
					$contentStr=$noBangding;
				}
				else{
					$contentStr= $this->vpost($user."&action=jindu&tel=".$rs["TEL"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}		
			elseif($EventKey == "手机版") {
				$contentStr= $this->vpost($erpurl."&action=MOBILE");
				if(substr($contentStr, 0, 2)=="OK"){
					$contentStr=md5(substr($contentStr, 0, 3).$fromUsername.$cid);
					$contentStr="<a href=\"http://www.eallcn.com/erpMb.php?cid=".$cid."&wx=".$fromUsername."&r=".$contentStr."\">点击此链接进入手机版</a>";
				}
//				$contentStr="<a href=\"http://60.28.246.112:8016/servlet/apple.mobil.main\">链接</a>";
			} else {
				$contentStr= $EventKey;
			}
		}
		elseif(!empty($PicUrl)) {
			$PicUrl= str_replace("&", "[d]", $PicUrl);
			$contentStr= $this->vpost($erpurl."&action=upimg&url=".$PicUrl);
			$contentStr= iconv('gb2312', 'utf-8', $contentStr);
		}
		elseif(!empty($keyword)) {
			//$keyword分析此值 如果为11位手机号和6位密码 进行绑定操作
			//回复6位数字 进行帐号绑定
			if(((strlen($keyword) == 6 && is_numeric($keyword))||$keyword=="易遨绑定")&&$id!=""&&$rs["IF_OK"]==0) {
					if($rs["PASSWD"]==$keyword||$keyword=="易遨绑定"){
						$sql="update ".$tname." set IF_OK=1 where id=".$id;
						mysql_query($sql,$conn);
						$contentStr="帐户绑定成功！";	
					}
					else{
						$contentStr="验证码错误,帐户绑定失败！";	
					}
			}
			elseif($keyword=="解除易遨绑定") {
					$sql="delete from ".$tname." where id=".$id;
					mysql_query($sql,$conn);
					$contentStr="解除绑定成功！";
			}
			//客户 回复手机号进行帐号注册
			elseif(strlen($keyword) == 11 && $this->checkMobile($keyword) == 1) {
				if($id==""){
					$contentStr= $this->vpost($user."&action=zhuce&key=".$keyword);
					$cm= explode("*", $contentStr);	
					if($cm[0]!=null&&is_numeric($cm[0])){
						$sql="insert into ".$tname."(COMPANYID,KHID,PASSWD,TYPE,IF_OK,WX,TEL)";	
						$sql.=" values(".$cid.",'".$cm[1]."','".$cm[0]."','kehu',0,'".$cid.$fromUsername."','".$keyword."')";
						mysql_query($sql,$conn);
						$contentStr="您的帐户注册成功.我们给您发送了认证短信,请接收";	
					}
					else{
						$contentStr="注册失败".$contentStr;
					}
				}
				else{
					if($rs["IF_OK"]==1){
						$contentStr="您的帐户已经认证过";
					}
					else{
						$contentStr="您的帐户已注册，请发送验证码认证";
					}
				}
			}
			//回复经纪人+手机号 经纪人帐号进行注册
			elseif(strlen($keyword) == 20 && $this->checkMobile(substr($keyword, 9)) == 1 && substr($keyword, 0, 9) == "经纪人") {
				$contentStr= $this->vpost($erpurl."&action=zhuce&type=jjr&key=".substr($keyword, 9));
				$contentStr= iconv('gb2312', 'utf-8', $contentStr);
			}
			//经纪人通过手机号定位房源
			elseif(strlen($keyword) > 7 && $this->checkMobile(substr($keyword, 7)) == 1 && substr($keyword, 0, 7) == "电话:") {
				$contentStr= $this->vpost($erpurl."&action=dwfy&tel=".substr($keyword, 7));
				$contentStr= iconv('gb2312', 'utf-8', $contentStr);
			}
			//经纪人通过房源编号定位房源
			elseif(strlen($keyword) > 10 && substr($keyword, 0, 7) == "编号:") {
				$contentStr= $this->vpost($erpurl."&action=dwfy&code=".substr($keyword, 7));
				$contentStr= iconv('gb2312', 'utf-8', $contentStr);
			}
			elseif(strlen($keyword) ==7 && substr($keyword, 0, 6) == "定位") {
				$contentStr=substr($keyword, 6);
				if($contentStr=="1"||$contentStr=="2"||$contentStr=="3"||$contentStr=="4"||$contentStr=="5"){
					$fyids=$rs["FYIDS"];
					if($fyids==""){
						$contentStr="您没有房源需要定位";
					}
					else{
						$in=(int)$contentStr;
						$cm= explode(";",$fyids);
						if($cm[$in-1]!=null){
							$sql="update ".$tname." set FYID='".$cm[$in-1]."' where ID=".$id;
							mysql_query($sql,$conn);
							$contentStr="房源定位成功";
						}
						else{
							$contentStr="输入错误，定位失败";
						}
					}
				}
				else{
					$contentStr="输入错误，定位失败";
				}
			}
			//业主修改委托
			elseif(strlen($keyword) >20 && substr($keyword, 0, 2) == "ft") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr= substr($keyword, 2);
					$contentStr= iconv('utf-8', 'gb2312', $contentStr);
					$contentStr= urlencode($contentStr);
					$contentStr= str_replace("%", "%25", $contentStr);
					$contentStr= $this->vpost($fy."&action=modwt&fyid=".$rs["FYID"]."&info=".$contentStr);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			//业主自评
			elseif(strlen($keyword) >20 && substr($keyword, 0, 2) == "zp") {
				if($rs["FYID"]==""){
					$contentStr="请先定位您的房源信息";
				}
				else{
					$contentStr= substr($keyword, 2);
					$contentStr= iconv('utf-8', 'gb2312', $contentStr);
					$contentStr= urlencode($contentStr);
					$contentStr= str_replace("%", "%25", $contentStr);
					$contentStr= $this->vpost($fy."&action=pj&fyid=".$rs["FYID"]."&info=".$contentStr);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			//修改需求委托
			elseif(strlen($keyword) >20 && substr($keyword, 0, 2) == "xt") {
				if($rs["XQIDS"]==""){
					$contentStr="请先定位您的需求信息";
				}
				else{
					$contentStr= substr($keyword, 2);
					$contentStr= iconv('utf-8', 'gb2312', $contentStr);
					$contentStr= urlencode($contentStr);
					$contentStr= str_replace("%", "%25", $contentStr);
					$contentStr= $this->vpost($xq."&action=modwt&ids=".$rs["XQIDS"]."&info=".$contentStr);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
			//服务评价
			elseif(strlen($keyword) >20 && substr($keyword, 0, 2) == "pj") {
				if($rs["TYPE"]!="kehu"){
					$contentStr=$noBangding;
				}
				else{
					$contentStr= substr($keyword, 2);
					$contentStr= iconv('utf-8', 'gb2312', $contentStr);  
					$contentStr= urlencode($contentStr);
					$contentStr= str_replace("%", "%25", $contentStr);
					$contentStr= $this->vpost($user."&action=pj&info=".$contentStr."&khid=".$rs["KHID"]);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
				}
			}
//			elseif(strlen($keyword) > 2 &&(substr($keyword, 0, 1) == "A" || substr($keyword, 0, 1) == "B" || substr($keyword, 0, 1) == "C" || substr($keyword, 0, 1) == "D" || substr($keyword, 0, 1) == "E")) {
//				$contentStr= substr($keyword, 1);
//				
//			}

			else {
				if(strlen($keyword)<15){
					$contentStr="您回复的内容太短，无法发送给您的专员";
				}
				//客户回复的内容，如果绑定给 就直接给经纪人提醒
				else{
					$contentStr= $keyword;
					$contentStr= iconv('utf-8', 'gb2312', $contentStr);
					$contentStr= urlencode($contentStr);
					$contentStr= str_replace("%", "%25", $contentStr);
					$contentStr= $this->vpost($erpurl."&action=huifu&t=".substr($keyword, 1)."&info=".$contentStr);
					$contentStr= iconv('gb2312', 'utf-8', $contentStr);
//					$contentStr= "字数".strlen($keyword);
				}	
			}
		} 
		else {
			$contentStr= $tmpstr;
		}
		$resultStr= sprintf($text, $fromUsername, $toUsername, $time, $msgType, $contentStr);
		echo $resultStr;
	}
	private function checkSignature() {
		$signature= $_GET["signature"];
		$timestamp= $_GET["timestamp"];
		$nonce= $_GET["nonce"];
		$token= TOKEN;
		$tmpArr= array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr= implode($tmpArr);
		$tmpStr= sha1($tmpStr);
		if($tmpStr == $signature) {
			return true;
		} else {
			return false;
		}
	}
}
?>