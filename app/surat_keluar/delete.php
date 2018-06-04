
<?php  
$id_surat_keluar = $_GET['id_surat_keluar'];

$crud = new Crud();

$dir_file = "../file/surat_keluar/";
$file     = $crud->view("SELECT file_surat FROM tb_surat_keluar WHERE id_surat_keluar='$id_surat_keluar'")[0];
unlink($dir_file.$file['file_surat']);

$res  = $crud->delete("tb_surat_keluar","id_surat_keluar = '$id_surat_keluar'");

if ($res) {
    header("location:index.php?page=view_surat_keluar");
}
?>