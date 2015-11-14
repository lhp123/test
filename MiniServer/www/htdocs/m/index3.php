<?
$MPOS="index";
include_once 'head.php'; 
?>
  <div class="I sousuo" pagename="Anjuke_Home">
      <div id="home_app_content"></div>
          <div class='home_header'>
              <i class="logo"></i>
          </div>
          <div class="b">
              <div class="b1">
                  <a href="fylist.php?y=mm" class="bb1 active home_anjuke">二手房</a>
                  <span class="div_line" style="display: none"></span>
                  <a href="fylist.php?y=zl" class="bb1 home_rental">租房</a>
              </div>
          </div>
	<div class="m">
        <div class="m1">
            <input class="sInput" type="text" autocomplete="off" placeholder="请输入小区名、地址等" id="searchInput" />
            <button id="search" class="top-btn search">搜索</button>
        </div>
        <div class="m2 index_region">
            <label class="Gf2">从区域开始：</label>
            <div id="area"></div>
        </div>

        <div class="m2 index_price">
            <label class="Gf2">从价格开始：</label>
            <div id="price"></div>
        </div>

            <div class="d1" id="recommend" style="display: none">
                <label class="Gf2">推荐二手房：</label>
                <div id="recContent"></div>
                <div class="recomm_more" id="recMore"><span><a href='fylist.php'>更多推荐</a></span></div>
            </div>


</div>
<div id="index_drop" class="drop"></div>


  </div>
<div id="result"></div>
<?include_once 'tail.php'; ?>

