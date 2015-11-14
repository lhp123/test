<?php
include_once 'Filter.php';
/**
sn:验证码传递的session名称
n:验证码的数量
w:验证码的宽度
 */
$codechar_s_name=filterParaAll($_REQUEST["sn"]);
$codechar_s_name=$codechar_s_name==""?"codechar":$codechar_s_name;
if($codechar_s_name!=""){
	session_start();
	$_SESSION[$codechar_s_name]="";
	unset($_SESSION[$codechar_s_name]);
	ob_end_flush();
	session_start();
 	$codechar_num=filterParaNumber($_REQUEST["n"]);
 	$codechar_num=$codechar_num==""?4:$codechar_num;
	
	$codechar_width=filterParaNumber($_REQUEST["w"]);
	$codechar_width=$codechar_width==""?60:$codechar_width;
	$codechar_width=60;
	$codechar_num=4;
	$codechar_height=20;
	
	getCode($codechar_num, $codechar_width, $codechar_height,$codechar_s_name);
}
function getCode($num,$w,$h,$sn) {
	// 去掉了 0 1 O l 等
	$str = "23456789abcdefghijkmnpqrstuvwxyz";
	$code = '';
	for ($i = 0; $i < $num; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	}
	//将生成的验证码写入session，备验证页面使用
	$_SESSION[$sn] = $code;
	
	//创建图片，定义颜色值
	Header("Content-type: image/PNG");
	$im = imagecreate($w, $h);
	
// 	echo $num.",".$w.",".$h.",".$sn;
	
	$black = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
	$gray = imagecolorallocate($im, 118, 151, 199);
	$bgcolor = imagecolorallocate($im, 235, 236, 237);

	//画背景
	imagefilledrectangle($im, 0, 0, $w, $h, $bgcolor);
	//画边框
	imagerectangle($im, 0, 0, $w-1, $h-1, $gray);
	//imagefill($im, 0, 0, $bgcolor);



	//在画布上随机生成大量点，起干扰作用;
	for ($i = 0; $i < 80; $i++) {
		imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
	}
	//将字符随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
	$strx = rand(3, 8);
	for ($i = 0; $i < $num; $i++) {
		$strpos = rand(1, 6);
		imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
		$strx += rand(8, 14);
	}
	imagepng($im);
	imagedestroy($im);
}
?>
