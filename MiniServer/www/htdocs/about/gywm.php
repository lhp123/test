<?php 
$pos = "关于我们";
?>
<?php include_once '../head.php';?>
<?php 
$title=filterParaByName("title");
if($title==""){
	$title="JIANJIE";
}
?>
<div id="center">
 
<?php include_once 'left.php';?>
  
  <div id="jjr_list">
  <?php 
//  			echo "select JIANJIE from XT_COM a where   a.ID='". $CID."'";
  			if($title=="JIANJIE"){
         		$content="企业概况";
         		$stmt=mysql_query("select JIANJIE from XT_COM a where   a.ID='". $CID."'",$conn);	
         	}else if ($title=="WENHUA"){
         		$content="企业文化";
         		$stmt=mysql_query("select WENHUA from XT_COM a where   a.ID='". $CID."'",$conn);	
         		
         	}else if ($title=="RONGYU"){
         		$content="企业荣誉";
         		$stmt=mysql_query("select RONGYU from XT_COM a where   a.ID='". $CID."'",$conn);	
         	}else if ($title=="LXWM"){
         		$content="联系我们";
         		$stmt=mysql_query("select LXWM from XT_COM a where   a.ID='". $CID."'",$conn);	
         	}	
			$rs = mysql_fetch_array ( $stmt );
  
  ?>
    <div id="jjr_list_titi"><?php echo$content?></div>
    <div id="news_main">
    
    	<?php echo$rs[0] ?>	
      	
    </div>
  </div>
</div>



<?php include_once '../tail.php';?>

