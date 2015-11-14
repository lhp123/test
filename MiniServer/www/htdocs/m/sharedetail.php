<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="textml; charset=UTF-8"> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta charset="utf-8"> 
	
	 <link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/photoswipe.css'>
	 <link rel='stylesheet prefetch' href='http://photoswipe.s3.amazonaws.com/pswp/dist/default-skin/default-skin.css'>
	 <link rel="stylesheet" type="text/css" href="netcss/style3.css"/>
	 <link rel="stylesheet" href="netcss/style4.css" media="screen" type="text/css" />
	 <script type="text/javascript" src="netjs/LAB.min.js"></script>
     <script type="text/javascript" src="netjs/sharedetail.min1.js"></script>
	<title></title>
 </head>
 <style>
 body {TEXT-ALIGN: center;}
.msKeimgBox img{width:90%;height:auto;margin-left:auto;margin-right:auto;}
#TEL{padding-left:40px;background:url("netimages/phone262.png") no-repeat scroll left center transparent; background-color:#ffffff;}
 </style>

 <body style="width:100%;">
 <div style="display:none;" ><img src="" id="urlshort" width="400" height="400"/></div>
		<div class="md-modal md-effect-17" id="modal-17">
			<div class="md-content">
				<div id="pops">
					<p>This is a modal window. You can do the following things with it:</p>
					<ul>
						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
						<li><strong>Close:</strong> click on the button below to close the modal.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>

 <div id="title"  style="width:100%;font-size:1.5em;margin-bottom:20px; text-align:center">
   <span>...</span></div>
 
  <div id="test" class="msKeimgBox" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;">	
  </div>
  <div id="countbro" style="margin-left:20px;font-size:1em;text-align:left;color:#666666;margin-bottom:45%;"></div>
 <div class="drop" id="drop" style="left:0px; bottom:0px;z-index:2;position:fixed;width:100%;text-align:center;heigth:5%">
 <input type="hidden" id="act"/><input type="hidden" id="act2"/><input type="hidden" id="act3"/>
	  <div>
		<input type="number" name="TEL" id="TEL" style="margin:0px 0px 0px 0px;width:80%;font-size:1.8em;vertical-align:middle;" placeholder="请先输入手机号" />
		</div>
		<a id="btn" href="#" style="width:95%;text-align:center; " data-modal="modal-17" class="button button-green md-trigger md-setperspective "><span id="btnw">...</span></a>
</div>




<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <div class="pswp__container">
            <!-- don't modify these 3 pswp__item elements, data is added later on -->
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>

<div class="md-overlay"></div><!-- the overlay element -->

<script src="netjs/tempindex.js" async="async"></script>
 </body>
</html>
