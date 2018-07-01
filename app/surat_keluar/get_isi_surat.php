<?php 

include "../helper/crud.php";

$id_jenis_surat = (!empty($_POST['id_jenis_surat'])?$_POST['id_jenis_surat']:"");

$data   = "";
if($id_jenis_surat){
    $crud   = new Crud();
    $result = $crud->view("SELECT no_surat, isi_surat, lampiran FROM tb_jenis_surat WHERE id_jenis_surat='$id_jenis_surat'")[0];
    $data   = array(
                    'no_surat'  => $result['no_surat'],
                    'isi_surat' => $result['isi_surat'],
                    'lampiran'  => $result['lampiran']
                );
}

echo json_encode(array("data"=>$data));

?>