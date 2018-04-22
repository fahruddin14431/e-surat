<?php 

include 'crud.php';
/**
* Auth Class
*/
class Auth {
	
	public function isKepalaBadan(){
		return ($_SESSION['sess_user']['sess_status'] == "KEPALA BADAN");
	}

	public function isAdmin(){
		return ($_SESSION['sess_user']['sess_status'] == "ADMIN");
	}

	public function isTU(){
		return ($_SESSION['sess_user']['sess_status'] == "TU");
	}

	public function isDinas(){
		return ($_SESSION['sess_user']['sess_status'] == "DINAS");
	}

	public function isPegawai(){
		return ($_SESSION['sess_user']['sess_status'] == "PEGAWAI");
	}

	public function getUser($id_pegawai){
		$sql    = "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";
		$crud   = new Crud();
		$result = $crud->view($sql);
		return $result[0]['nama'];
	}
	
}

 ?>
