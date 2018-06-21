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

	public function isInstansi(){
		return ($_SESSION['sess_user']['sess_status'] == "INSTANSI");
	}

	public function isBidang(){
		return ($_SESSION['sess_user']['sess_status'] == "BIDANG");
	}

	public function getUser($id_user){
		$sql    = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
		$crud   = new Crud();
		$result = $crud->view($sql);
		return $result[0]['nama'];
	}
	
}

 ?>
