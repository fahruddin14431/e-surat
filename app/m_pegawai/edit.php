
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_pegawai = $_POST['id_pegawai'];

// update pegawai
$data = array(
    'nip'        => $_POST['nip'], 
    'nama'       => $_POST['nama'], 
    'id_jabatan' => $_POST['id_jabatan']
);

$res = $crud->update("tb_pegawai",$data, "id_pegawai = '$id_pegawai'");

// update login
$data1 = array(
    'status'        => $_POST['status']
);

$res1 = $crud->update("tb_login",$data1, "id_pegawai = '$id_pegawai'");

if ($res && $res1) {
    header("location:../index.php?page=view_pegawai");
}

?>