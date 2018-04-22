
<?php  
$id_pegawai = $_GET['id_pegawai'];

$crud = new Crud();
$res  = $crud->delete("tb_pegawai","id_pegawai = '$id_pegawai'");

if ($res) {
    header("location:index.php?page=view_dinas");
}
?>