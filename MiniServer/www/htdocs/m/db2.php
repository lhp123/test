<?


/*mobile Function*/


 //include_once('../eall/DBCON_YD.php');


 include_once('db/db2con_yd.php');


function p_gbk($str){


	echo iconv('utf-8', 'GBK', $str);


}


function p_utf8($str){


	echo iconv('GBK//TRANSLIT', 'utf-8//TRANSLIT', $str);


}



function get_gbk($str){


	return iconv('utf-8', 'GBK', $str);


}


function get_utf8($str){


	return iconv('GBK', 'utf-8', $str);


}
?>