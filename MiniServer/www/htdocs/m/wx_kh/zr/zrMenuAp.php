<?php
$xjson = ' {
     "button":[
     {	
			"name":"找房",
           "sub_button":[
            {
	           "type":"view",
	           "name":"二手房",
	           "url":"http://hmu146140.chinaw3.com/m/fylist.php?y=mm"
            },
            {
	           "type":"view",
	           "name":"租房",
	           "url":"http://hmu146140.chinaw3.com/m/fylist.php?y=zl"
            },
            {
	           "type":"view",
	           "name":"新房",
	           "url":"http://hmu146140.chinaw3.com/m/xflist.php"
            }]
      },
      {
			"name":"委托",
           "sub_button":[
            {
	           "type":"view",
	           "name":"小区",
	           "url":"http://hmu146140.chinaw3.com/m/xqlist.php"
            },
            {
	           "type":"view",
	           "name":"经纪人",
	           "url":"http://hmu146140.chinaw3.com/m/jjrlist.php"
            },
            {
	           "type":"view",
	           "name":"委托",
	           "url":"http://hmu146140.chinaw3.com/m/weituo.php"
            },
            {
	           "type":"view",
	           "name":"留言",
	           "url":"http://hmu146140.chinaw3.com/m/ly.php"
            }]
      },
      {
			"name":"猜你喜欢",
           "sub_button":[
            {
	           "type":"view",
	           "name":"关于我们",
	           "url":"http://hmu146140.chinaw3.com/m/about.php"
            },
            {
	           "type":"view",
	           "name":"贷款计算器",
	           "url":"http://hmu146140.chinaw3.com/m/jsq/fdjsq_sy.php"
            }]
       }]
 }';
 //https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx4c8e8f5b14afb037&secret=d2f75091271dc2506186de24f8605083
 //https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN
 //http://m.eallcn.com/wx_kh/zr/zrMenuAp.php
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN";
$result = vpost($url,$xjson);
var_dump($result);
 
function vpost($url,$data){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
    // curl_setopt($curl, CURLOPT_AUTOREFERER, 1); 
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $tmpInfo = curl_exec($curl);
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);
    }
    curl_close($curl);
    return $tmpInfo;
}
?>