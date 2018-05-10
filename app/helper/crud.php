<?php 

include_once 'koneksi.php';

/**
* crud
*/
class Crud {

	public $Koneksi;
	
	function __construct(){
		$this->koneksi = new Koneksi();
	}

	public function view($sql){
		$result = $this->koneksi->setQuery($sql);
		$data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
	}

	public function insert($table, $params){
		$sql  	= "INSERT INTO $table ";
		$field 	= "";
		$row 	= "";
		foreach ($params as $key => $value) {
			$field  .= ",".$key;
			$row	.= ",'".$value."'";
		}
		$sql	.= "(".substr($field, 1).")";
		$sql	.= " VALUES(".substr($row, 1).")";
		$result  = $this->koneksi->setQuery($sql);
		return $sql;
	}

	public function update($table, $params, $id){
		$sql = "UPDATE $table SET ";
		$set="";
		foreach ($params as $key => $value) {
			$set .= ",".$key."='".$value."'";
		}
		$sql .= substr($set, 1)." WHERE $id";
		$res = $this->koneksi->setQuery($sql);
		return $res;
	}

	public function delete($table, $id){
		$sql = "DELETE FROM $table";
		if (!empty($id)) {
			$sql .= " WHERE $id";
		}		
		$res = $this->koneksi->setQuery($sql);
		return $res;
	}

	public function makeId($table, $id, $prefix){
		$result = $this->koneksi->setQuery("SELECT MAX($id) as id FROM $table");
		$row = $result->fetch_assoc()['id'];
		$id;
		if(empty($row)){
			$id = $prefix."1001";
		}else{
			$id = $prefix. strval(substr($row,3)+1);
		}
		return $id;
	}

	public function checkIfExist($sql){
		$res = $this->koneksi->setQuery($sql);
		$row = $res->num_rows;
		return $row;
	}


}

 ?>
