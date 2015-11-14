<?php 
class DML{
	private $conn="";
	private $tablename="";
	
	private $select="*";
	
	private $cols=array();
	private $vals=array();	
	private $colsstr="";
	private $valsstr="";
	private $setstr="";
	
	private $where=array();
	private $wherestr="";
	
	private $orderCol="";
	private $rowlimit=0;
	
	public function __construct($conn,$tablename){
		$this->conn=$conn;
		$this->tablename=$tablename;
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
	
	
	public function setTable($tablename){
		$this->tablename=$tablename;
	}
	
	public function getTable(){
		return $this->tablename;
	}
	
	public function setSelect($select){
		if($select!="")
			$this->select=$select;
	}
	
	public function getSelect(){
		return $this->select;
	}
	
	public function setCols($cols){
		if($this->isEmpty($cols))
			return;
		else
			$this->cols=$cols;
		
		$colsstr="";
		for($i=0;$i<count($this->cols);$i++){
			if($this->cols[$i]!=""){
				$colsstr.=",".$this->cols[$i];
			}
		}
		$colsstr=substr($colsstr,strlen(","));
		$this->colsstr=$colsstr;
	}
	
	public function setVals($vals){
		if($this->isEmpty($vals))
			return;
		else
			$this->vals=$vals;
		
		$valsstr="";
		for($i=0;$i<count($this->vals);$i++){
			if($this->vals[$i]!=""){
				$valsstr.=",".$this->vals[$i];
			}
		}

		$valsstr=substr($valsstr,strlen(","));
		$this->valsstr=$valsstr;
	}
	
	public function setUpdate($cols_vals){
		$cols=array();
		$vals=array();
		$setstr="";
		if(!isEmpty($cols_vals)){
			foreach($cols_vals as $k=>$v){
				array_push($cols, $k);
				array_push($vals, $v);	
				if($k!="") $setstr.=",".$k."=".$v;

			}
			$this->cols=$cols;
			$this->vals=$vals;
			$setstr=substr($setstr,strlen(","));
			$this->setstr=$setstr;
		}
	}
	
	public function setInsert($cols_vals){
		$cols=array();
		$vals=array();
		$colsstr="";
		$valsstr="";
		if(!isEmpty($cols_vals)){
			foreach($cols_vals as $k=>$v){
				array_push($cols, $k);
				array_push($vals, $v);
				if($k!="") $colsstr.=",".$k;
				if($v!="") $valsstr.=",".$v;
			}
			$this->cols=$cols;
			$this->vals=$vals;		
			
			$colsstr=substr($colsstr,strlen(","));
			$this->colsstr=$colsstr;
			
			$valsstr=substr($valsstr,strlen(","));
			$this->valsstr=$valsstr;			
		}
	}
	
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
		$wherestr=substr($wherestr,strlen(" and "));
		$this->wherestr=$wherestr;
	}
		
	public function getWhere(){
		return $this->wherestr;
	}
	
	public function setOrderby($orderby){
		if($orderby!="")
			$this->orderby=$orderby;
	}
	
	public function getOrderby(){
		return $this->orderby;
	}
	
	public function setLimit($rowlimit){
		if($rowlimit>0)
			$this->rowlimit=$rowlimit;
	}
	
	public function getLimit(){
		return $this->rowlimit;
	}
	
	/*获取sql语句*/
	public function getSelectSql(){
		return $this->creatSql("S");
	}
	
	public function getUpdateSql(){
		return $this->creatSql("U");
	}
	
	public function getInsertSql(){
		return $this->creatSql("I");
	}
	
	public function getDeleteSql(){
		return $this->creatSql("D");
	}
	
	public function clearCondition(){
		$this->select="*";
		$this->wheres=array();
		$this->wherestr="";
		$this->orderby="";
		$this->rowlimit=0;
	}

	/**
	 * 创建SQL语句
	 * @param String $oper [S,U,I,D]
	 * @return string
	 */
	private function creatSql($oper){
		$sql="";
		if($oper=="S"){
			$where=" where ";
			if($this->wherestr!=""){
				$where.=" ".$this->wherestr;
			}
			if($this->orderby!=""){
				$where.=" order by ".$this->orderby;
			}
			if($this->rowlimit>0){
				$where.="  limit 0,".$this->rowlimit;
			}
			$sql="select ".$this->select." from ".$this->tablename;
			if($where!=" where " && strlen($where)>strlen(" where ")){
				$sql.=" ".$where;
			}
		}
		else if($oper=="U"){
			if($this->setstr==""){
				return "";
			}
			$sql="update ".$this->tablename." set ".$this->setstr." where ".$this->wherestr;
		}
		else if($oper=="I"){
			if($this->colsstr==""||$this->valsstr==""){
				return "";
			}
			$sql="insert into ".$this->tablename." ( ".$this->colsstr." ) values( ".$this->valsstr.")";
		}
		else if($oper=="D"){
			if($this->wherestr==""){
				return "";
			}
			$sql="delete from ".$this->tablename." where ".$this->wherestr;			
		}
		return $sql;
	}

	//执行SQL
	public function selectQuery($sql=""){
		if($sql==""){
			$sql=$this->creatSql("S");
		}
		$stmt=mysql_query($sql,$this->conn);
// 		echo $sql;
		$this->clearCondition();
		return $stmt;
	}
	
	public function updateExecute($sql=""){
		if($sql==""){
			$sql=$this->creatSql("U");
		}
		mysql_query($sql);
		$success=mysql_affected_rows();
		$this->clearCondition();
		return $success>0?true:false;
	}
	
	public function insertExecute($sql=""){
		if($sql==""){
			$sql=$this->creatSql("I");
		}
		mysql_query($sql);
		$success=mysql_affected_rows();
		$this->clearCondition();
		return $success>0?true:false;
	}
	
	public function deleteExecute($sql=""){
		if($sql==""){
			$sql=$this->creatSql("D");
		}
		mysql_query($sql);
		$success=mysql_affected_rows();
		$this->clearCondition();
		return $success>0?true:false;
	}
	
	
	
}

?>