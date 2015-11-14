  <script type="text/javascript" src="js/cp.js"></script>
  <script type="text/javascript" src="js/Glb.js"></script>  
  <?if($MPOS=="index"){ ?>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/eall.js"></script>
  <?} ?>
  <?if($MPOS=="list"){ ?>
	<script type="text/javascript" src="js/fy.js"></script> 
	<script type="text/javascript" src="js/List.js"></script>  
	<script type="text/javascript">T.trackSpeed();</script>
   <?} ?>  
  <?if($MPOS=="detail"){ ?>
	<script type="text/javascript" src="js/View.js"></script>
	<script type="text/javascript">T.trackSpeed();</script>
   <?} ?>  
   
	</div><!-- bodyc end -->
	
 </body>
</html>

    <script>
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
                var overlaydivstr="<div id='overlay' style='width: 100%;height:"+(window.screen.width)+"px;text-align:center;'><span>请竖屏浏览，以达到最佳浏览效果！</span></div>";
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
    
    /*
    var supportsOrientationChange = "onorientationchange" in window,  
        orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";  
      
    window.addEventListener(orientationEvent, function() {  
	    if(window.orientation==90||window.orientation==-90){
	    	//alert("请用竖屏浏览，以达到最佳效果！");
	        //alert('HOLY ROTATING SCREENS BATMAN:' + window.orientation);
	    }  
    }, false);  
    */
    </script>  