<?php 
class ListPage{
	private $curPage=1;
	private $pageSize=10;
	private $total=1;
	private $orderCol="";
	private $otherCondition="";
	private $where=array();
	private $wherestr="";
	private $tablename="";
	private $sql = "";
	private $conn;
	
	public function __construct($conn,$tablename,$pageSize,$orderCol){
		$this->conn=$conn;
		$this->tablename=$tablename;
		$this->pageSize=$pageSize;
		$this->orderCol=$orderCol;
		
		$curPage=filterParaNumberByName("curPage");
		$this->curPage=($curPage==""||$curPage==0)?$this->curPage:$curPage;		
	}
	
	/**
	 * 私有方法
	 */
	
	/**
	 * 判断数组是否为空数组及数组元素是否为全部为空.
	 * @param unknown_type $arr
	 * @return boolean
	 */
	private function isEmpty($arr){
		if($arr==null) return true;
		if(!is_array($arr)) return true;
		if(empty($arr)) return true;
		for($i=0;$i<count($arr);$i++){
			if($arr[$i]!="") return false;
		}
		return true;
	}
	
	/**
	 * 私有方法
	 */
	
	
	/**
	 * 公共方法
	 */
	
	public function setSelect($select){
		if($select!="")
			$this->select=$select;
	}	
	
	public function getSelect(){
		return $this->select;
	}
	/**
	 * 获取列表总记录数
	 * @return number
	 */
	public function getTotal(){
		return $this->total;
	}
	
	/**
	 * 获取列表总页数
	 * @return number
	 */	
	public function getTotalPage(){
		return ceil($this->total/$this->pageSize);
	}
	
	/**
	 * 获取Where条件字符串
	 * @return string
	 */
	public function getWherestr(){
		return $this->wherestr;
	}
	/**
	 * 获取列表查询SQL语句
	 * @return string
	 */
	public function getSql(){
		return $this->sql;
	}
	/**
	 * 设置Sql语句中的其它限制条件
	 * @param unknown_type $otherCondition
	 */
	public function setOtherCondition($otherCondition){
		if($otherCondition!="")
			$this->otherCondition=$otherCondition;
	}
		

	/**
	 * 设置当前列表查询的Where条件
	 * 传入参数为数组，组合成字符串返回
	 * @param array $where
	 */
	public function setWhere($where){
		if($this->isEmpty($where))
			return;
		else
			$this->where=$where;
	
		$wherestr="";
		if(count($this->where)>0){
			for($i=0;$i<count($this->where);$i++){
				if($this->where[$i]!=""){
					$wherestr.=" and ".$this->where[$i];
				}
			}
		}
		//echo strlen(" and ")."--";
		$wherestr=substr($wherestr,strlen(" and "));
		if($wherestr!="") $wherestr=" where ".$wherestr;
		$this->wherestr=$wherestr;
	}
	
	/**
	 * 生成列表查询的SQL语句
	 * @param String $select
	 * @param array $where
	 * @return void|string
	 */
	public function creatSql(){
		if($this->select==""||$this->tablename=="") return;

		$this->sql="select ".$this->select." from ".$this->tablename." ";				
		$this->sql.=" ".$this->wherestr;
		
		if($this->otherCondition!="")
			$this->sql.=" ".$this->otherCondition;
				
		if($this->orderCol!="")
			$this->sql.=" order by ".$this->orderCol;
		
		if($this->pageSize!="")
		    $this->sql.=" limit ".($this->curPage-1)*$this->pageSize.", ".$this->pageSize;

		return $this->sql;
	}
	
	
	public function selectQuery($sql=""){
		if($sql==""){
			$sql=$this->creatSql();
		}
// 		echo substr($sql, 0,!strpos( $sql,"limit")?strlen($sql):strpos( $sql,"limit"));
// 		echo $sql;
		$stmt=mysql_query(substr($sql, 0,!strpos( $sql,"limit")?strlen($sql):strpos( $sql,"limit")),$this->conn);		
		$this->total=mysql_num_rows($stmt);
		$stmt=mysql_query($sql,$this->conn);
		return $stmt;
	}
	
	
	/**
	 * 分页
	 *
	 * @param unknown_type $total
	 */
	public function getPageBar1() {
		$pagestr="";
		$pagestr.= "<div id='fany'>";
		$pagestr.= "<FORM name=form_page action='' method=get >";
		$pagestr.= "<table  border='0' align='center' cellpadding='0' cellspacing='0' style='height:65px;margin: 0 auto;'>";
		$pagestr.= "<tr>";
		$arr = $_GET;
		reset ( $arr );
		while ( list ( $key, $value ) = each ( $arr ) ) {
			if ($key != "curPage") {
				$pagestr.= "<input type=hidden name='" . $key . "' value='" . filterPara ( $value ) . "' />";
				$url .= $key . "=" . $value . "&";
			}
		}
		$arr = $_POST;
		reset ( $arr );
		while ( list ( $key, $value ) = each ( $arr ) ) {
			if ($key != "curPage") {
				$pagestr.= "<input type=hidden name='" . $key . "' value='" . filterPara ( $value ) . "' />";
				$url .= $key . "=" . $value . "&";
			}
		}
		$pagestr.= "<input type=hidden name='curPage' value='' />";
		$totalPage = intval ( $this->total / $this->pageSize );
		if (($totalPage * $this->pageSize) < $this->total) {
			$totalPage = $totalPage + 1;
		}
		if ($totalPage != "") {
			$pagestr.= "<td align='center' style='width:50px;'><div class='fany_box1'>共" . $totalPage . "页</div></td>";
		}
		if ($this->curPage == "") {
			$this->curPage = 1;
		}
		if ($this->curPage == 1 && $this->total == 0) {
			$pagestr.= "<div style='width:100px;height:30px;line-height:30px;margin-left:auto;margin-right:auto'>暂无数据可查看!</div>";
		} elseif ($this->curPage == 1) {
			$pagestr.= "<td align='center' style='width:45px;'><div class='fany_box1' style='color: #e0e0e0;border-color: #f0f0f0;'><a href='javascript:void(0)'  style='color: #e0e0e0;border-color: #f0f0f0;cursor: default;' title='已到首页!' >首页</a></div></td>" . "<td align='center' style='width:45px;'><div class='fany_box2' style='color: #e0e0e0;border-color: #f0f0f0;background-image:url(/images/ico_fy2h.jpg);'><a href='javascript:void(0)' title='已到首页!没有上一页了' style='color: #e0e0e0;border-color: #f0f0f0;cursor: default;' >上一页</a></div></td>";
		} else {
	
			$pagestr.= "<td align='center' style='width:45px;'><div class='fany_box1'><a href='javascript:void(0)' onclick=PageNext(1)>首页</a></div></td>" . "<td align='center' style='width:45px;'><div class='fany_box2'><a href='javascript:void(0)' onclick=PageNext(" . ($this->curPage - 1) . ") >上一页</a></div></td>";
		}
		$pagestr.= "<td align ='center' style='height: 18px;line-height: 18px;'>";
		if ($this->curPage < 5) {
			for($i = 1; $i <= $totalPage & $i < 9; $i ++) {
				if ($i == $this->curPage) {
					$pagestr.= "<a href='javascript:void(0)' ><span style='background-color: #fff;color: #eb6100;border: none;margin: 4px 5px 0 5px;float: left;cursor: default;font-weight: bold;'>" . $this->curPage . "</span></a>";
				} else {
					$pagestr.= "<a href='javascript:void(0)' onclick=PageNext(" . $i . ") ><span style='list-style: none;float: left;height: 20px;padding-right: 8px;padding-left: 8px;background-color: #FFF;
                    border: 1px solid #ccc;margin-right: 1px;line-height: 20px;cursor: pointer;'>" . $i . "</span></a>";
				}
			}
		} elseif ($totalPage < 9) {
			$i = $this->curPage - 4;
			for(; $i <= $totalPage & $i < (4 + $this->curPage); $i ++) {
				if ($i == $this->curPage) {
					$pagestr.= "<a href='javascript:void(0)' ><span style='background-color: #fff;color: #eb6100;border: none;margin: 4px 5px 0 5px;float: left;cursor: default;font-weight: bold;'>" . $this->curPage . "</span></a>";
				} else {
					$pagestr.= "<a href='javascript:void(0)' onclick=PageNext(" . $i . ") ><span style='list-style: none;float: left;height: 20px;padding-right: 8px;padding-left: 8px;background-color: #FFF;
                    border: 1px solid #ccc;margin-right: 1px;line-height: 20px;cursor: pointer;'>" . $i . "</span></a>";
				}
			}
		} elseif (($this->curPage - 4) >= 1) {
			$i = $this->curPage - 4;
			for(; $i <= $totalPage & $i < (4 + $this->curPage); $i ++) {
				if ($i == $this->curPage) {
					$pagestr.= "<a href='javascript:void(0)' ><span style='background-color: #fff;color: #eb6100;border: none;margin: 4px 5px 0 5px;float: left;cursor: default;font-weight: bold;'>" . $this->curPage . "</span></a>";
				} else {
					$pagestr.= "<a href='javascript:void(0)' onclick=PageNext(" . $i . ") ><span style='list-style: none;float: left;height: 20px;padding-right: 8px;padding-left: 8px;background-color: #FFF;
                    border: 1px solid #ccc;margin-right: 1px;line-height: 20px;cursor: pointer;'>" . $i . "</span></a>";
				}
			}
		}
	
		$pagestr.= "</td>";
	
		if ($this->curPage != $totalPage & $this->total != 0) {
	
			$pagestr.= "<td align='center' style='width:45px;'><div class='fany_box3' ><a href='javascript:void(0)' onclick=PageNext(" . ($this->curPage + 1) . ")>下一页</a></div></td>
            <td align='center' style='width:45px;'><div class='fany_box1'><a href='javascript:void(0)' onclick=PageNext(" . $totalPage . ")>末页</a></div></td>";
		} else if ($this->curPage == $totalPage) {
			$pagestr.= "<td align='center' style='width:45px;'><div class='fany_box3' style='color: #e0e0e0;border-color: #f0f0f0;background-image:url(/images/ico_fy1h.jpg);'><a href='javascript:void(0)'style='color: #e0e0e0;border-color: #f0f0f0;cursor: default;' title='已到尾页!没有下一页了' >下一页</a></div></td>
            <td align='center' style='width:45px;'><div class='fany_box1' style='color: #e0e0e0;border-color: #f0f0f0;'><a href='javascript:void(0)' title='已到尾页!' style='color: #e0e0e0;border-color: #f0f0f0;cursor: default;' >末页</a></div></td>";
		}
	
		$pagestr.= " </tr></table></FORM>";
		$pagestr.= "<script language='JavaScript' type='text/javascript'>function PageNext(page){";
		$pagestr.= "form_page.curPage.value=page;form_page.submit();";
		$pagestr.= "}";
		$pagestr.= "</script>";
		$pagestr.= "</div>";
		return $pagestr;
	}
	
	
	/**
	 * 分页  ---后台分页
	 * @param unknown_type $total
	 */	
	public function getPageBar2(){
	    $curPage = $this->curPage;	
	    $this->countTotal();
	    if ($this->total % $this->pageSize == 0){
	        $pageCount=(int)($this->total/$this->pageSize);
	    }
	    else {
	        $pageCount=(int)($this->total/$this->pageSize)+1;
	    }
	
	    echo '<div id="fy">
        <form id = "pageform" action="" method="post">
          <div style="float:left;">
          	<table border="0" cellpadding="0" cellspacing="0">
          	<tr>
    			<td width="79" align="center">
    	           <div id="fy_but">
    	              <table width="100%" border="0" cellpadding="0" cellspacing="0">';
	
	    if($curPage<=1){
	        echo '<tr style="background-color: #64676C; cursor: default;">
    				     <td width="28" align="center" valign="middle"><img src="/images/fy1.png" width="8" height="9" /></td>
    				     <td align="left" valign="middle"  ><a style=" cursor: default;" href="javascript:void(0)"  title="已到首页!">首页</a></td>
    				 </tr>';
	    }else{
	        echo ' <tr >
    				      <td width="28" align="center" valign="middle"><img src="/images/fy1.png" width="8" height="9" /></td>
    				     <td align="left" valign="middle"  ><a href="javascript:void(0)" onclick="nextPage(1)" >首页</a></td>
    				  </tr>';
	    }
	
	    echo '</table> </div></td><td width="79">'  ;
	    echo '<div id="fy_but">
    		         <table width="100%" border="0" cellpadding="0" cellspacing="0">';
	    if($curPage<=1){
	        echo '<tr style="background-color: #64676C;cursor: default;">
    				     <td width="20" align="center" valign="middle"><img src="/images/fy2.png" width="12" height="8" /></td>
    				     <td align="left" valign="middle" ><a href="javascript:void(0);" style=" cursor: default;" title='.($curPage<=1?"已到首页!没有上一页了":"").'>上一页</a></td>
    				  </tr>';
	         
	    }else {
	        echo '<tr>
    				     <td width="20" align="center" valign="middle"><img src="/images/fy2.png" width="12" height="8" /></td>
    				     <td align="left" valign="middle" ><a href="javascript:void(0);"  onclick="nextPage('.($curPage<=1?"1":($curPage-1)).')" >上一页</a></td>
    				  </tr>';
	    }
	
	    echo '</table></div></td>';
	     
	    echo '<td width="105" align="left">第&nbsp;'.($curPage<=1?"1":($curPage>=$pageCount?$pageCount:$curPage)).'&nbsp;页&nbsp;&nbsp;共&nbsp;'.$pageCount.'&nbsp;页</td>
    			  <td width="79"><div id="fy_but">
    	              	<table width="100%" border="0" cellpadding="0" cellspacing="0">';
	
	    if($curPage>=$pageCount){
	        echo '<tr style="background-color: #64676C;">
    			        <td align="right" valign="middle"   ><a href="javascript:void(0);" style=" cursor: default;"  title="已到尾页!没有下一页">下一页</a></td>
    			        <td width="20" align="center" valign="middle"><img src="/images/fy3.png" width="12" height="8" /></td>
    			     </tr>';
	    }else{
	        echo ' <tr>
    			         <td align="right" valign="middle"   ><a href="javascript:void(0);" onclick="nextPage('.($curPage>=$pageCount?$pageCount:($curPage+1)).')" >下一页</a></td>
    			         <td width="20" align="center" valign="middle"><img src="/images/fy3.png" width="12" height="8" /></td>
    			      </tr>';
	    }
	     
	    echo '</table></div></td>';
	    echo ' <td width="79">
                  	<div id="fy_but">
    	              	<table width="100%" border="0" cellpadding="0" cellspacing="0">';
	    if($curPage>=$pageCount){
	        echo '<tr style="background-color: #64676C;">
	
    			                <td align="right" valign="middle"  ><a href="javascript:void(0);" style=" cursor: default;"  title="'.($curPage>=$pageCount?"已到尾页!":"").'" >末页</a></td>
    			                <td width="28" align="center" valign="middle"><img src="/images/fy4.png" width="8" height="9" /></td>
    			            </tr>';
	    }else {
	        echo '<tr >
    			                <td align="right" valign="middle"  ><a href="javascript:void(0);"  onclick="nextPage('.$pageCount.')"  >末页</a></td>
    			                <td width="28" align="center" valign="middle"><img src="/images/fy4.png" width="8" height="9" /></td>
    			            </tr>';
	    }
	
	    echo '</table></div></td>';
	     
	    echo         '<td><input type="text" value="'.$this->curPage.'" style="width:20px; text-align:center;"name="curPage" size="1" id="curPage"/>&nbsp;</td>
        			      <td><input type="button" value="跳转" onclick="tz()"/></td>
                          <td width="79">
                        </tr>
                    </table>
                  </div>';
	    echo '<div style="float:right; padding-right:10px;">';
	    if ($curPage==1) {
	        echo "显示1-".$this->pageSize."条";
	    }else if ($curPage!=$pageCount&$curPage!=1) {
	        $down=$this->pageSize*($curPage-1)+1;
	        $up=$this->pageSize*$curPage;
	        echo "显示".$down."-".$up."条";;
	    }else{
	        $down=$this->pageSize*($curPage-1)+1;
	        echo "显示".$down."-".$this->total."条";
	    }
	
	    echo ',共 '.$this->total.'条</div>';
	
	
	    $arr = $_GET;
	    reset ($arr);
	    while (list($key, $value) = each ($arr)) {
	        if($key!="curPage"){
	            echo "<input type=hidden name='".$key."' value='".filterPara($value)."' />";
	
	        }
	    }
	    $arr =$_POST;
	    reset ($arr);
	    while (list($key, $value) = each ($arr)) {
	        if($key!="curPage"){
	            echo "<input type=hidden name='".$key."' value='".filterPara($value)."' />";
	             
	        }
	    }
	
	
	    echo ' </form>
              <script language="JavaScript" type="text/javascript">
                  function nextPage(page){
            	      document.getElementById("curPage").value = page;
            	      document.getElementById("pageform").submit();
                      }
                   function tz(){
          	        var curPage=document.getElementById("curPage").value;
        
          	        if(curPage>'.$pageCount.'||curPage<1){
            	          alert("输入的页码有误!");
          	  	        }else{
          	  	  	        document.getElementById("pageform").submit();
          	  	  	    }
          	        }
            </script>
         </div>' ;
	     
	}
	
}
?>