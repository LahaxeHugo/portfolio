<?php

class base_element {
	public $parameter = array();
	public $type = 0;
	
	public function __construct($param_dbObj, $param_dbTable) {
		$this->dbObj = $param_dbObj;
		$this->dbTable = $param_dbTable;
	}
	
	protected function convertArr2Query($arr = array()) {
		$arrConvert = array();
		foreach ($arr as $name => $value) {
			$arrConvert[] = '`'.$name.'` = "'.$value.'"';
		} 
		unset($name, $value);
		return implode(', ', $arrConvert);
		
	}
	
	public function load($id = 0) {
		$load_req = 'SELECT * FROM `' .$this->dbTable .'`' 
							.(!empty($id) ? 'WHERE `id` = '.$id : '')
							. (isset($this->order_name) ? ' ORDER BY '.$this->order_name : '');
		$load_data = array();
		
		if(($load_res = $this->dbObj->query($load_req)) === FALSE) {
			$errorInfo = $this->dbObj->errorInfo();
			$tStr = sprintf(DBERROR_fmt, __FILE__, __LINE__, $errorInfo[1], $errorInfo[2], $load_req);
			error_log($tStr); unset($tStr, $errorMsg);
		} else {
				while($load_array = $load_res->fetch(PDO::FETCH_ASSOC)) {
					$load_data[] = $load_array;
				}
		}
		unset($load_req, $load_res, $load_array);
		return $load_data;
	}
	
	public function insertInto($arr = array()) {
		$arr2str = $this->convertArr2Query($arr);
		
		$insert_req = 'INSERT INTO `' .$this->dbTable .'` SET ' .$arr2str;
		error_log($insert_req);
		if($this->dbObj->query($insert_req) === FALSE) {
			$errorInfo = $this->dbObj->errorInfo();
			$tStr = sprintf(DBERROR_fmt, __FILE__, __LINE__, $errorInfo[1], $errorInfo[2], $insert_req);
			error_log($tStr); unset($tStr, $errorMsg);
		}
	}
	
	public function update($arr = array(), $id = 1) {
		$arr2str = $this->convertArr2Query($arr);
		
		$update_req = 'UPDATE `'. $this->dbTable .'` SET '.$arr2str .' WHERE `id` = ' .$id;
		if($this->dbObj->query($update_req) === FALSE) {
			$errorInfo = $this->dbObj->errorInfo();
			$tStr = sprintf(DBERROR_fmt, __FILE__, __LINE__, $errorInfo[1], $errorInfo[2], $update_req);
			error_log($tStr); unset($tStr, $errorMsg);
		}
	}
	
	public function order() {
		
	}
	
	public function delete($id = 0) {
		$del_req = 'DELETE FROM `' .$this->dbTable .'` WHERE `id` = ' .$id;
		if($this->dbObj->query($del_req) === FALSE) {
			$errorInfo = $this->dbObj->errorInfo();
			$tStr = sprintf(DBERROR_fmt, __FILE__, __LINE__, $errorInfo[1], $errorInfo[2], $del_req);
			error_log($tStr); unset($tStr, $errorMsg);
		}
	}
	
	public function updateImg() {
		
	}
	public function addImg() {
		
	}
	
	public function getFile($name = 'picture', $id = 1) {
		$getImg_req = 'SELECT `'.$name.'` FROM `' .$this->dbTable .'` WHERE `id` = ' .$id;
		
		if(($getImg_res = $this->dbObj->query($getImg_req)) === FALSE) {
			$errorInfo = $this->dbObj->errorInfo();
			$tStr = sprintf(DBERROR_fmt, __FILE__, __LINE__, $errorInfo[1], $errorInfo[2], $getImg_req);
			error_log($tStr); unset($tStr, $errorMsg);
		} else {
			$image = $getImg_res->fetch();
			return $image[$name];
		}
		
	}
}

class general_info extends base_element {
}
class site extends base_element {
}
class presentation extends base_element {
}
class career extends base_element {
}
	
	
?>