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
 //  http://www.eallcn.com/menuAp.php
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=JokHfz2YVA-kLXdxoYzLOIA2j-tw_YD-8K5MT3dukhP6kHGb8W3xPObSLplF72Q39UzZ-CUk9xXEen3FWDutwPMANrYxxbTa2T9lDxEFELAGr5X63w6SOmA9r18UtxBMwIA07FFtEHhSUoQ0Xcyykg";
$result = vpost($url,$xjson);
var_dump($result);
 
function vpost($url,$data){ // ģ���ύ��ݺ���
    $curl = curl_init(); // ��һ��CURL�Ự
    curl_setopt($curl, CURLOPT_URL, $url); // Ҫ���ʵĵ�ַ
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // ����֤֤��4Դ�ļ��
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // ��֤���м��SSL�����㷨�Ƿ����
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // ģ���û�ʹ�õ������
    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // ʹ���Զ���ת
    // curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // �Զ�����Referer
    curl_setopt($curl, CURLOPT_POST, 1); // ����һ����Post����
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post�ύ����ݰ�x
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ���ó�ʱ���Ʒ�ֹ��ѭ��
    curl_setopt($curl, CURLOPT_HEADER, 0); // ��ʾ���ص�Header��������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ��ȡ����Ϣ���ļ������ʽ����
    $tmpInfo = curl_exec($curl); // ִ�в���
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//��ץ�쳣
    }
    curl_close($curl); // �ر�CURL�Ự
    return $tmpInfo; // �������
}
?>