<?php
require_once 'EallAction.php';
class PhotoAction extends EallAction{
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_PHOTO t");
	}
	
	public function getPhotoInfo($wz,$memo="",$type="图片",$pos="全局"){
		$where = array(" CID='".$this->cid."'");
		if($pos!=""){
			array_push($where, " POS='".$pos."'");
		}
		if($wz!=""){
			array_push($where, " SYWZ='".$wz."'");
		}
		if($memo!=""){
			array_push($where, " MEMO='".$memo."'");
		}
		if($type!=""){
			array_push($where, " TYPE='".$type."'");
		}
		$rs=$this->getResultOfFirstrow("*",$where);
		return array("SRC"=>$rs["SRC"]
				,"URL"=>$rs["URL"]
				,"HEIGHT"=>$rs["HEIGHT"]
				,"WIDTH"=>$rs["WIDTH"]
				,"URL"=>$rs["URL"]);
	}
	
	public function showPhotoImage($wz,$ifa=false,$memo="",$type="图片",$pos="全局"){
		$pinfo=$this->getPhotoInfo($wz,$memo,$type,$pos);
		$height=$pinfo ["HEIGHT"]==0?"100%":($pinfo ["HEIGHT"]."px");
		$width=$pinfo ["WIDTH"]==0?"100%":($pinfo ["WIDTH"]."px");
		if($pinfo["SRC"]!=""){
			if ($pinfo ["URL"] != "" && $ifa) {
				$pstr= "<A href='" . $pinfo ["URL"] . "' target=_blank>
				<IMG src='" . getPhoto ( $pinfo ["SRC"] ) . "' height='" . $height . "' width='" . $width . "'>
				</A>";
			} else{
				$pstr= "<IMG src='" . getPhoto ( $pinfo ["SRC"] ) . "' height='" . $height . "'  width='" . $width . "'>";
			
			}
		}
		return array("photohtml"=>$pstr,"ifHasAdv"=>($pinfo["SRC"]!=""?true:false));
	}

}
?>