<?php
$xjson = ' {
     "button":[
     {	
			"name":"找房",
           "sub_button":[
            {
               "type":"view",
               "name":"二手房",
               "url":"http://m.eallcn.com/fylist.php?y=mm"
            },
            {
               "type":"view",
               "name":"租房",
               "url":"http://m.eallcn.com/fylist.php?y=zl"
            },
		    {
               "type":"view",
               "name":"新房",
               "url":"http://m.eallcn.com/xflist.php"
            }]
      },
      {
			"name":"委托",
           "sub_button":[
            {
               "type":"view",
               "name":"小区",
               "url":"http://m.eallcn.com/xqlist.php"
            },
            {
               "type":"view",
               "name":"经纪人",
               "url":"http://m.eallcn.com/jjrlist.php"
            },
            {
               "type":"view",
               "name":"委托",
               "url":"http://m.eallcn.com/weituo.php"
            },
            {
               "type":"view",
               "name":"留言",
               "url":"http://m.eallcn.com/ly.php"
            }]
      },
      {
			"name":"猜你喜欢",
           "sub_button":[
            {
               "type":"view",
               "name":"关于我们",
               "url":"http://m.eallcn.com/about.php"
            },
            {
               "type":"view",
               "name":"贷款计算器",
               "url":"http://m.eallcn.com/jsq/fdjsq_sy.php"
            }]
       }]
 }';
 //https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxdc577957221bb62c&secret=a68c9b3031a5d42cf129af65b3d943ee
 //https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN
 //  http://www.eallcn.com/menuAp.php

// https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx5492c8b1172baf7a&secret=fa41de0e2feec4ad3934a6f43bd24722
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=8jsqfxpRmdb8qhWGbQBtPNfQx_mvRg0Yci2FWp07ZQD0Q-JVtrGZNUO0ik-__VxufrJ6EiIauJwjU0z_bmfzG1tXZEx6tCWPKnajwfJ6LQVWrid0q9YCJpIENveYq87wg0AN9SeOnOSW4TAYusdhzg";
$result = vpost($url,$xjson);
var_dump($result);
 
function vpost($url,$data){ // ???????????
    $curl = curl_init(); // ?????CURL??
    curl_setopt($curl, CURLOPT_URL, $url); // ????????
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // ????????4?????
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // ??????м??SSL????????????
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // ???????????????
    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // ?????????
    // curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // ???????Referer
    curl_setopt($curl, CURLOPT_POST, 1); // ?????????Post????
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post????????x
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ???ó?????????????
    curl_setopt($curl, CURLOPT_HEADER, 0); // ????????Header????????
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ???????????????????????
    $tmpInfo = curl_exec($curl); // ??в???
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//?????
    }
    curl_close($curl); // ???CURL??
    return $tmpInfo; // ???????
}
?>