
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_pegawai = $_POST['id_pegawai'];

$data = array(
    'nama'       => $_POST['nama']
);

$res = $crud->update("tb_pegawai",$data, "id_pegawai = '$id_pegawai'");

if ($res) {
    header("location:../index.php?page=view_dinas");
}

?>