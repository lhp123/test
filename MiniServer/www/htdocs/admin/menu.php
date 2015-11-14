  <div id="main_left">
  	<table border="0" cellpadding="0" cellspacing="0" style="color:#FFF;">
    	<tr>
        	<td width="67" align="center">
       	    <img src="<?php echo $adminpath;?>images/adminimg.jpg" width="47" height="44" /></td>
          <td width="143">
              <strong>您好，<?php echo $SUSERNAME?></strong><br /><br />
              <a href="javascript:window.location.reload();">刷新</a>&nbsp;|&nbsp;<a href="<?php echo $adminpath;?>login.php?loginout=1">退出</a>
          </td>
      </tr>
      <tr>
      	<td colspan="2"><img src="<?php echo $adminpath;?>images/lin.jpg" width="210" height="20" /></td>
      </tr>
    </table>
    <div id="left_nav">
    	<div id="navigation"> <!-- Navigation begins here -->
			<div class="sidenav"><!-- Sidenav -->				
				<?php 				
					foreach ($menu1 as $key=>$val){
				?>
				<div class="navhead"><img src="<?php echo $adminpath;?>images/ico1.png" width="14" height="12" /><span><?php echo $val;?></span></div>
					<div class="subnav">
						<ul class="submenu">
							<?php	
// 							print_r($menu2);
								if($menu2!=null && $menu2[$val]!=null){
									foreach($menu2[$val] as $key=>$val){
							?>							
							<li><a href="<?php echo $adminpath.$val;?>" title="">&nbsp;<?php echo $key;?></a></li>							
							<?php 
									}
								}
							?>
						</ul>
					</div>
				<?php }?>
				
			</div>
		</div>
    </div>
  </div>
  