
<?php  
$id_surat_masuk = $_GET['id_surat_masuk'];

$crud = new Crud();
$res  = $crud->delete("tb_surat_masuk","id_surat_masuk = '$id_surat_masuk'");

if ($res) {
    header("location:index.php?page=view_surat_masuk_tu");
}
?>