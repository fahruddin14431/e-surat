
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_jenis_surat = $_POST['id_jenis_surat'];

$data = array(
    'no_surat'    => $_POST['no_surat'],
    'jenis_surat' => $_POST['jenis_surat']
);

$res = $crud->update("tb_jenis_surat", $data, "id_jenis_surat = '$id_jenis_surat'");

if ($res) {
    header("location:../index.php?page=view_jenis_surat");
}

?>