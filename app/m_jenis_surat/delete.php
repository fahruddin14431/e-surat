
<?php  
$id_jenis_surat = $_GET['id_jenis_surat'];

$crud = new Crud();
$res  = $crud->delete("tb_jenis_surat","id_jenis_surat = '$id_jenis_surat'");

if ($res) {
    header("location:index.php?page=view_jenis_surat");
}
?>