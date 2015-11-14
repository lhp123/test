<?include_once 'INCLUDE.php';?>
<?include_once 'head.php';?>

<script src="http://map.soso.com/api/v2/main.js?key=a0e9b58abf9bc7fb9da6dfb9ede95171"></script>
 <div>
 <div class="H">
      <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="" data-city="tj"> <span></span> <i></i> <span>返回</span> </a><?=filterParaByName("name")?>街景
 </div>
<input ID='XQNAME' name='XQNAME' type='hidden' value='<?=filterParaByName("name") ?>'>
<div class='t_map' id=JIEJINGDIV style='float: left; '></div>
</div>
<script type="text/javascript">

var windowWidth, windowHeight;
if (self.innerHeight) { // all except Explorer    
    if (document.documentElement.clientWidth) {
        windowWidth = document.documentElement.clientWidth;
    } else {
        windowWidth = self.innerWidth;
    }
    windowHeight = self.innerHeight;
} else {
    if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode    
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else {
        if (document.body) { // other Explorers    
            windowWidth = document.body.clientWidth;
            windowHeight = document.body.clientHeight;
        }
    }
} 
//alert("windowWidth:"+windowWidth+"   windowHeight:"+windowHeight);
var jiejingDiv = document.getElementById("JIEJINGDIV");
jiejingDiv.style.width = windowWidth+"px";
jiejingDiv.style.height = (windowHeight-46)+"px";
</script>
<script src="js/mapjj.js"></script>

<?include_once 'tail.php'; ?>