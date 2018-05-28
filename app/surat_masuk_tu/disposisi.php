
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_surat   = $_POST['id_surat'];

$data = array(
    'id_jabatan'  => $_POST['id_jabatan'],
    'instruksi'  => $_POST['instruksi'],
);

$crud = new Crud();
$res = $crud->update("tb_surat_masuk", $data, "id_surat_masuk = '$id_surat'");

if ($res) {
    header("location:../index.php?page=view_disposisi");
}

?>