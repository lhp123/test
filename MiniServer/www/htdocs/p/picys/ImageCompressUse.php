<?
include_once 'ImageCompress.php'; 
?>
<?php 
/*
$img_data = "img.jpg"; //600*399
$img_name1 = "img_50.jpg"; 
$img_name2 = "img_10.jpg"; 
$imgurl="image/";
*/
/*
$t=new ThumbHandler();      
$t->setSrcImg($img_data); 
$t->setCutType(1);
$t->setDstImg($imgurl.$img_name1); 
$t->createImg(50); 

$t=new ThumbHandler();      
$t->setSrcImg($img_data); 
$t->setCutType(1);
$t->setDstImg($imgurl.$img_name2); 
$t->createImg(10); 
*/

//downPic("http://apwt.fboos2.com:8016/upfile/2013-10/D28/54/fyimg/1382923623405.jpg");
//echo getListPic("http://apwt.fboos2.com:8016/upfile/2013-10/D29/54/fyimg/1383017571601.jpg");
//echo "<br>";
//echo getListPic("");
//delPic("1382682188752.JPG","../image_b/");

/**
 * 下载图片
 *
 * @param 远程图片路戏 $pu
 * @param 下载后的路径 $downurl
 * @return 下载后的路径+文件名
 */
function downPic($pu,$downurl="image_b/"){
	$tmp=explode("/",$pu);
	$picn=$tmp[count($tmp)-1];
	$tmp=explode(".",$picn);
	$picn=$tmp[0];	
	if(strpos(" ".$pu,"http://")>=1){
	    $data = file_get_contents($pu); // 读文件内容 
	    $filepath = $downurl;//图片保存的路径目录 
	/*
	    $filetime = time(); //得到时间戳    
	    $filepath = $downurl.date("Ym",$filetime)."/";//图片保存的路径目录 
	    if(!is_dir($filepath)){
	    	mkdir($filepath,0777, true);
	    }
	*/
	    $filename = $picn.'.'.substr($pu,-3,3); //生成文件名，
	    $fp = @fopen($filepath.$filename,"w"); //以写方式打开文件
	    @fwrite($fp,$data); //
	    fclose($fp);
	    return $filepath.$filename;
	}else{
		return false;
	}
    
}
/**
 * 压缩图片
 *
 * @param 原图路径 $pu
 * @param 压缩百分比，不传此参数时默认20% $per
 * @param 压缩后图片输出路径 $outurl
 * @param 如果原图路径为空时，显示此图 $defurl
 * @return 压缩后的图片路径及文件名，如果原图为空则显示默认
 */
function getCompressPic($pu,$per=50,$outurl="image_s/",$defurl="img/view_default.jpg"){
	global $CITYURL;
	$CITYURL="";
	if($per=="") $per=20;
	if($outurl=="") $outurl="image_s/";
	if($pu!=""){
		if(strpos(" ".$pu,"http://")<1&&strpos(" ".$pu,"/netup/")<1){
			return $pu;
		}else if(strpos(" ".$pu,"/netup/")>=1){
			if($CITYURL!=""){
				$pu="/".$CITYURL.$pu;
			}else {
				$pu="".$pu;
			}
			
		}	
// 		if(strpos(" ".$pu,"/netup/")>=1){
// 			$pu="http://menhu.eallcn.com".$pu;
// 		}		
		if($per==20){$outurl.="per20/";}
		else if($per==50){$outurl.="per50/";}
		else if($per==80){$outurl.="per80/";}		

		$tmp=explode("/",$pu);
		$picn=$tmp[count($tmp)-1];
		$tmp=explode(".",$picn);
		$picn=$tmp[0];
		$img_name = $picn."_".$per.".".substr($pu,-3,3); 
	
	    if(!file_exists($outurl.$img_name)){//图片不存在，则生成小图
			$img_data = downPic($pu);
			if(!$img_data) return $pu;			
			$aa=getimagesize($pu);
			$weight=$aa["0"];////获取图片的宽
			$height=$aa["1"];///获取图片的高			
			if($weight<600){		
				//echo "weight:".$weight.";height:".$height.",".$_SERVER["DOCUMENT_ROOT"]."/".$img_data.",".$_SERVER["DOCUMENT_ROOT"]."/".$outurl.$img_name;
				$success=copy($img_data,$outurl.$img_name);
				//echo ",success:$success";
			}else{
				$t=new ThumbHandler();
				$t->setSrcImg($img_data);
				$t->setCutType(1);
				$t->setDstImg($outurl.$img_name);
				$t->createImg($per);
			}
			delPic($picn.".".substr($pu,-3,3));
	    }
		return $outurl.$img_name;
	}
	else{
		return $defurl;
	}
}
function delPic($dname,$durl="image_b/"){	
	if(file_exists($durl.$dname)){//图片存在则删除，返回true;
		unlink($durl.$dname);
		return true;
	}	
	else{
		return false;
	}
}

?>  