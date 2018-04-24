<?php 

include "../helper/crud.php";

$id_jenis_surat = (!empty($_POST['id_jenis_surat'])?$_POST['id_jenis_surat']:"");

$data   = "";
if($id_jenis_surat){
    $crud   = new Crud();
    $result = $crud->view("SELECT isi_surat FROM tb_jenis_surat WHERE id_jenis_surat='$id_jenis_surat'")[0];
    $data   = $result['isi_surat'];
}

echo json_encode(array("data"=>$data));

?>