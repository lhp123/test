<?php 
require_once (PATH_WEBROOT.'include/ListPage.php');
require_once (PATH_WEBROOT.'include/DML.php');
class EallAction{
	private $conn="";
	private $pageSize=10;
	protected  $cid="";
	private $tablename="";	
	private $action="";
	
	protected $_paraArray=array();
			
	protected function __construct($conn,$cid){
		$this->conn=$conn;
		$this->cid=$cid;
	}	
	
	public function doAction(){
		$arr_get=$_GET;
		$arr_post=$_POST;
		$this->_paraArray=array_merge_recursive($arr_get, $arr_post);
		if(filterParaAll($this->_paraArray["ac"])=="save"){
			$this->doSaveActionIn();
		}
		else if(filterParaAll($this->_paraArray["ac"])=="del"){
			$this->doDelActionIn();
		}
		else{
			$this->doActionIn();
		}			
	}
	protected function doActionIn(){}	
	protected function doSaveActionIn(){}
	protected function doDelActionIn(){}
	
	
	
	protected function setTable($tablename){
		$this->tablename=$tablename;
	}
	
	protected function getTable(){
		return $this->tablename;
	}
	
	protected function setPagesize($pageSize){
		$this->pageSize=$pageSize;
	}
	
	protected function getPagesize(){
		return $this->pageSize;
	}
	
	/*处理JSON数组*/
	private function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
		static $recursive_counter = 0;
		if (++$recursive_counter > 1000) {
			die('possible deep recursion attack');
		}
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} else {
				$array[$key] = $function($value);
			}
			if ($apply_to_keys_also && is_string($key)) {
				$new_key = $function($key);
				if ($new_key != $key) {
					$array[$new_key] = $array[$key];
					unset($array[$key]);
				}
			}
		}
		$recursive_counter--;
	}
		
	public function toJSON($array) {
		$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
	}
	
	/**
	 * 获取分页结果集
	 * @param string $select
	 * @param array $where
	 * @param string $orderby
	 * @return ListPage
	 */
	protected function getResultOfListpage($select="",$where="",$orderby="",$tablename="",$otherCondition=""){
		if($tablename=="") $tablename=$this->tablename;
		$listPage=new ListPage($this->conn,$tablename,$this->pageSize,$orderby);
		$listPage->setSelect($select);
		if(!is_array($where)){
			$where=array($where);
		}		
		$listPage->setWhere($where);
		$listPage->setOtherCondition($otherCondition);			
		$stmt=$listPage->selectQuery();
// 		echo $listPage->getSql();
		$rows=$listPage->getTotal();
		return array("result"=>$stmt,"rows"=>$rows,"pagebar"=>$listPage->getPageBar1());
	}
	
	/**
	 * 获取分页结果集，自定义每页行数
	 * @param unknown_type $pagesize
	 * @param unknown_type $select
	 * @param unknown_type $where
	 * @param unknown_type $orderby
	 * @return ListPage
	 */
	protected function getResultOfListpageWithPagesize($pagesize,$select="",$where="",$orderby="",$tablename="",$otherCondition=""){
		if($tablename=="") $tablename=$this->tablename;
		if($pagesize==""||$pagesize==0) $pagesize=$this->pageSize;
		$listPage=new ListPage($this->conn,$tablename,$pagesize,$orderby);
		$listPage->setSelect($select);		
		if(!is_array($where)){
			$where=array($where);
		}
		$listPage->setWhere($where);
		$listPage->setOtherCondition($otherCondition);
		$stmt=$listPage->selectQuery();
		$rows=$listPage->getTotal();
		return array("result"=>$stmt,"rows"=>$rows,"pagebar"=>$listPage->getPageBar1());
	}
	
	/**
	 * 获取不分页结果集，对默认表进行查询，自定义查询列及条件和排序方式
	 * @param int $rowlimit
	 * @param string $select
	 * @param array $where
	 * @param string $orderby
	 * @return multitype:number resource
	 */
	protected function getResultOfListNoPage($rowlimit=0,$select="",$where="",$orderby=""){
		$dml=new DML($this->conn,$this->tablename);	
		$dml->setSelect($select);
		
		if(!is_array($where)){
			$where=array($where);
		}
		$dml->setWhere($where);
		
		$dml->setOrderby($orderby);
		$dml->setLimit($rowlimit);
		
// 		echo $dml->getSelectSql();
		$stmt=$dml->selectQuery();

		$rows=mysql_num_rows($stmt);
		return array("result"=>$stmt,"rows"=>$rows);
	}
	/**
	 * 获取不分页结果集，通过单独的自定义SQL进行查询
	 * @param int $rowlimit
	 * @param string $sql
	 * @return multitype:number resource
	 */
	protected function getResultOfListNoPageBySql($sql){
		$dml=new DML($this->conn,"");
		$stmt=$dml->selectQuery($sql);
// 		echo $dml->getSelectSql();
		$rows=mysql_num_rows($stmt);
		return array("result"=>$stmt,"rows"=>$rows);
	}
	/**
	 * 获取结果集中第一行数据，适用：通过ID查找某一条信息。
	 * @param unknown_type $select
	 * @param unknown_type $where
	 * @param unknown_type $orderby
	 */
	protected function getResultOfFirstrow($select="",$where=""){
		$dml=new DML($this->conn,$this->tablename);
		$dml->setSelect($select);
		
		if(!is_array($where)){
			$where=array($where);
		}
		$dml->setWhere($where);
// 		echo $dml->getSelectSql();
		$stmt=$dml->selectQuery();		
		return mysql_fetch_array($stmt);
	}
	/**
	 * 获取结果集中第一行数据，适用：通过ID查找某一条信息。
	 * @param unknown_type $select
	 * @param unknown_type $where
	 * @param unknown_type $orderby
	 */
	protected function getResultOfFirstrowBySql($sql=""){
		$dml=new DML($this->conn,$this->tablename);
		$stmt=$dml->selectQuery($sql);
// 		echo $dml->getSelectSql();
		return mysql_fetch_array($stmt);
	}
	/**
	 * 按条件获取表中某个字段的第一个值
	 * @param unknown_type $colname
	 * @return string|Ambigous <>
	 */
	protected function getColValue($colname,$where=""){
		$dml=new DML($this->conn, $this->tablename);
		if($colname==null||$colname==""){
			return "";
		}
		$dml->setSelect($colname);
		if(!is_array($where)){
			$where=array($where);
		}
		$dml->setWhere($where);
// 		echo $dml->getSelectSql();
		$stmt=$dml->selectQuery();
		$rs=mysql_fetch_array($stmt);
		return $rs[0];
	}
	
	
	
	/**
	 * 执行修改操作
	 * @param unknown_type $cols
	 * @param unknown_type $vals
	 * @param unknown_type $where
	 * @return resource
	 */
	protected function executeUpdate($cols_vals ,$where=""){
		$dml=new DML($this->conn, $this->tablename);
		
		if(isEmpty($cols_vals)){
			return false;
		}				
		$dml->setUpdate($cols_vals);
		
		if(!is_array($where)){
			$where=array($where);
		}
		$dml->setWhere($where);
// 		echo $dml->getUpdateSql();
		return $dml->updateExecute();
	}
	/**
	 * 执行修改操作，自定义SQL语句
	 * @param unknown_type $sql
	 * @return resource
	 */
	protected function executeUpdateBySql($sql){
		$dml=new DML($this->conn, $this->tablename);
		return $dml->updateExecute($sql);
	}
	
	
	/**
	 * 执行新增操作
	 * @param unknown_type $cols_vals
	 * @return boolean|resource
	 */
	protected function executeInsert($cols_vals){
		$dml=new DML($this->conn, $this->tablename);		
		if(isEmpty($cols_vals)){return false;}
		$dml->setInsert($cols_vals);
// 		echo $dml->getInsertSql();
		return $dml->insertExecute();
	}
	/**
	 * 执行新增操作，自定义SQL语句
	 * @param unknown_type $cols_vals
	 * @return boolean|resource
	 */
	protected function executeInsertBySql($sql){
		$dml=new DML($this->conn, $this->tablename);
		return $dml->insertExecute($sql);
	}
	
}

?>