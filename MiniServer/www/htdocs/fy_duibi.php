

<!-- 房源对比 功能-->
<div id="apDiv2">
  <div id="apDiv2_main">
  	<div id="apDiv2_main_tit">
    	<span class="left">房源对比</span>
        <div class="right" style="padding-top:13px;"><a onclick="Hidden('apDiv2')" id="db_close"><img src="images/succ_cha.jpg" width="15" height="15" /></a></div>
    </div>
    <form name="db_fy" action="fydb.php" method="get">
    <div  style="margin:0 5px; background:#FFF; overflow:hidden;">
    	<ul id="db_fylist">
        	<li>您已经选择了<span class="org" id="db_count">2</span>条房源</li>       
         </ul>
         <ul>
            <li style="text-align:center; line-height:50px;">
            	<input id="fydbgo_but" name="" value="开始对比" type="submit" style="background:url(images/bnt_bg.png); border:0px; width:75px; height:22px; font-size:12px; color:#FFF; font-family:'微软雅黑';" />
            </li>            
        </ul>
    </div>
    <input type="hidden" name="db_type" value="<?php echo $pos=="二手房"?"mm":"zl";?>">    
    </form>
  </div>
</div>

<script type="text/javascript">
/*
        $(function(){
            var dragging = false;
            var iX, iY;
            $("#apDiv2").mousedown(function(e) {
                dragging = true;
                iX = e.clientX - this.offsetLeft;
                iY = e.clientY - this.offsetTop;
                this.setCapture && this.setCapture();
                return false;
            });
            document.onmousemove = function(e) {
                if (dragging) {
                var e = e || window.event;
                var oX = e.clientX - iX;
                var oY = e.clientY - iY;
                $("#apDiv2").css({"left":oX + "px", "top":oY + "px"});
                return false;
                }
            };
            $(document).mouseup(function(e) {
                dragging = false;
                $("#apDiv2")[0].releaseCapture();
                e.cancelBubble = true;
            })
 
        }) 
        */
</script>