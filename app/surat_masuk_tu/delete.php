
<?php  
$id_surat_masuk = $_GET['id_surat_masuk'];

$crud = new Crud();

$dir_file = "../file/surat_masuk/";
$file     = $crud->view("SELECT scan_surat, file_surat FROM tb_surat_masuk WHERE id_surat_masuk='$id_surat_masuk'")[0];
unlink($dir_file.$file['scan_surat']);
unlink($dir_file.$file['file_surat']);

$res  = $crud->delete("tb_surat_masuk","id_surat_masuk = '$id_surat_masuk'");

if ($res) {
    header("location:index.php?page=view_surat_masuk_tu");
}
?>