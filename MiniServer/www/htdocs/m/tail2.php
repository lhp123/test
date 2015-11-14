  
  <div id="tailmenu" style="position: fixed; left:0px; bottom:0px; z-index:1000; width:100%; overflow:visible; text-align:center; _position:absolute; _top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); margin:0 auto; clear:both; cursor:pointer;">
  <div class="tail" style="width:100%; height:50px; background:#333; margin:0 auto;">
 <ul><li class="tail_f1" >
  <a href="index.php">
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/7.png" width="20" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/7.png',sizingMethod='image'); float:left;" /></td>
   
      <td height="20" align="center" valign="bottom" class="tail_font">首 页</td>
	   </tr>

  </table>
  </a>
</li>
<a href="jsq/fdjsq_sy.php">
<li class="tail_l2" >
  <table width="70" border="0" cellspacing="0" cellpadding="0" align="center" >
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/8.png" width="18"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/8.png',sizingMethod='image'); float:left;
	  " /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">按揭器</td>
    </tr>
  </table>
</li>
</a>
<a href="jjrlist.php" >
<li class="tail_w2" >
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/9.png" width="20"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/9.png',sizingMethod='image'); float:left;" /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">经纪人</td>
    </tr>
  </table>
</li>
</a>
<a href="about.php">
<li class="tail_g2" >
  <table width="60" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="32" align="center" valign="bottom"><img src="netimages/10.png" width="20"  style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='netimages/10.png',sizingMethod='image'); float:left;" /></td>
      <td height="20" align="center" valign="bottom" class="tail_font">招 聘</td>
    </tr>
  </table>
</li>
</a>
</ul>

  </div>
</div>
	
  <script type="text/javascript" src="js/cp.js"></script>
  <script type="text/javascript" >var murl="<?=$MURL?>";</script>
  <script type="text/javascript" src="js/Glb.js"></script>  
  <?if($MPOS=="index"){ ?>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/eall.js"></script>
  <?} ?>
  <?if($MPOS=="list" || $MPOS=="list_detail"){ ?>
	<script type="text/javascript" src="js/fy.js"></script> 
	<script type="text/javascript" src="js/List.js"></script>  
	<script type="text/javascript">T.trackSpeed();</script>
   <?} ?>  
  <?if($MPOS=="detail" || $MPOS=="list_detail"){ ?>
	<script type="text/javascript" src="js/View.js"></script>
	<script type="text/javascript">T.trackSpeed();</script>
   <?} ?>  
   
	</div><!-- bodyc end -->
	
 </body>
</html>
    <script>
    var phonetype = navigator.userAgent;
    if(phonetype.indexOf("MicroMessenger")>=0){
    	  document.getElementById("tailmenu").style.display="none";
    	  //document.getElementById("topbar").style.display="none";
    }else{
    	document.getElementById("fbinfo").innerHTML="<div id='inner'><img src='netimages/fp.jpg' width='300' height='171'/></div> ";
	    var updateorientation = function (){
	        var classname = '',top = 100;  
	        switch(window.orientation){  
	            case 0:  
	            classname += "normal";  
	            break;  
	      
	            case -90:  
	            classname += "landscape";  
	            break;  
	      
	            case 90:  
	            classname += "landscape";  
	            break;        
	        }
	        var bodyobj=document.getElementsByTagName("body")[0];
	        if (classname == 'landscape') {  
	            if (document.getElementById("overlay")==null) {
	                window.scrollTo(0, 1); 
	                //alert(window.screen.height);
	                var overlaydivstr="<div id='overlay' style='width: 100%;height:"+(window.screen.width)+"px;text-align:center;'>"+document.getElementById("fbinfo").innerHTML+"</div>";
	                bodyobj.innerHTML=overlaydivstr+bodyobj.innerHTML;  
					document.getElementById("bodyc").style.display="none";
	            }
	        } else {  
	            bodyobj.removeChild(document.getElementById("overlay"));  
	            document.getElementById("bodyc").style.display="";
	        }  
	    };  
	
	////////////////////////////////      
	    var supportsOrientationChange = "onorientationchange" in window,  
	    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";  
	      
	    window.addEventListener(orientationEvent, function() {  
	        updateorientation();  
	    }, false);  

	    document.body.onload=function(){updateorientation(); }
    }
    </script>  