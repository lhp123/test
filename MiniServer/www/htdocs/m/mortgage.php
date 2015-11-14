<?include_once 'INCLUDE.php'; ?>
<?
$MENU="gy";
$MPOS="about";
include_once 'head.php'; 
$sql="SELECT JIANJIE FROM XT_COM WHERE ID='".$CID."'";
$stmt=mysql_query($sql,$conn);
$rs=mysql_fetch_array($stmt);
?>
<style type="text/css">
        .pinch-zoom,
        .pinch-zoom img{
            width: 100%;
            -webkit-user-drag: none;
        }

    </style>
 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
 <link href="netcss/View.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="netjs/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/pinchzoom.js"></script>
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L">
    <div>
     <div class="list_header_container">
      <div id="list_header">

       <div class="H" id="topbar">
        <a class="back" id="prop_view_header" href="index.php" > <span></span> <i></i> <span>首页</span> </a>
        按揭</span>
       </div>
       
       
      </div>
     </div>
	 <script type="text/javascript">
        $(function () {
            $('.pinch-zoom').each(function () {
                new RTP.PinchZoom($(this), {});
            });
        })
    </script>
      <div class="pinch-zoom">
     <img src="netimages/mortgage.jpg" width="100%" id="gy_img" style="margin-bottom:10%;"/>
    </div>
     </div>
    </div>
   </div>
  </div>
  
  
<!-- 
<div id="" class="userpeo" >TEST</div>
 -->

<?include_once 'tail2.php'; ?>
