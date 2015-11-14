<?php 
$photoAlt=filterPara($DPhotoAlt);
if(is_array($DPhotos)&&count($DPhotos)>0){
	$photos=$DPhotos;
	if(isEmpty($photos)){
		$photos = array(ZW_FY_B);
	}
	for($i=0;$i<count($photos);$i++){
		if($photos[$i]==""){
			unset($photos[$i]);
		}
	}
?>
      <div id="zzjs_net" style="position:fixed;top:0px; background:url(images/123.png); z-index:2;left:0px;display:none; width:100%; height:100%;"></div>
      <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><!-- 代码 开始 -->            
            <div style="HEIGHT: 240px; OVERFLOW: hidden;" id=idTransformView>
              <ul id=idSlider class=slider>
              <?php for($i=0;$i<count($photos);$i++){ 
              
              	?>
                <div style="POSITION: relative"> <a href="<?php echo $photos[$i];?>" target="_blank"><img alt="<?php echo $photoAlt."_".($i+1)?>" src="<?php echo $photos[$i];?>" width=320 height=240></a> </div>
              <?php }?>
              </ul>
            </div>
            <p align="center">
              <input type="button" value="查看全部<?php echo count($photos);?>张图片" onClick="locking();">
            </p>
            <div>
              <ul id=idNum class=hdnum>
             	<?php for($i=0;$i<count($photos);$i++){
             		?>
                <li><img src="<?php echo $photos[$i];?>" width=61px height=45px></li>
                <?php }?>
              </ul>
              <script language=javascript>
               mytv("idNum","idTransformView","idSlider",240,<?php echo count($photos)>5?5:count($photos);?>,true,2000,5,true,"onmouseover");
                //按钮容器aa，滚动容器bb，滚动内容cc，滚动宽度dd，滚动数量ee，滚动方向ff，延时gg，滚动速度hh，自动滚动ii，
              </script>
            </div>
            
            
            <!--浮层框架开始-->            
            <div id="www_zzjs_net" align="center" style="position:fixed;z-index:999; background:url(images/xcbg.png); display:none; width:1000px; left:50%; margin-left:-500px; top:50%; margin-top:-250px;  padding-bottom:10px; height:490px;  ">
              <div style="color:#fff; width:1000px; height:25px; line-height:35px;font-weight:bold;font-size:12px; text-align:right; overflow:hidden; "><a href="JavaScript:;" class="style1" onClick="Lock_CheckForm(this);">[关闭]</a></div>
              <div class="albumSlider">
                <div class="fullview"> <img src="<?php echo $photos[0];?>" alt="<?php echo $photoAlt?>" /> </div>
                <div class="slider">
                  <div class="imglistwrap">
                    <ul class="imglist">
                      <?php foreach($photos as $v){
                      
						?>
                      <li><a href="<?php echo $v;?>" target="_blank"><img src="<?php echo $v;?>" alt="<?php echo $photoAlt?>" /></a></li>
                      <?php }?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>            
            <!--浮层框架结束-->            
            
            
            <!-- 代码 结束 --></td>
        </tr>
      </table>

<?php }?>