
<?php  

$id_surat_masuk = $_GET['id_surat_masuk'];

$data = array(
    'status'    => "1"
);

$crud = new Crud();
$res = $crud->update("tb_surat_masuk", $data, "id_surat_masuk = '$id_surat_masuk'");

if ($res) {
    header("location:index.php?page=view_surat_masuk_tu");
}

?>