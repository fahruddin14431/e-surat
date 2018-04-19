
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_pegawai = $crud->makeId("tb_pegawai", "id_pegawai", "PEG");

// insert pegawai
$data = array(
    'id_pegawai' => $id_pegawai,
    'nip'        => $_POST['nip'], 
    'nama'       => $_POST['nama'], 
    'id_jabatan' => $_POST['id_jabatan']
);

$res = $crud->insert("tb_pegawai",$data);

// insert login
$data1 = array(
    'nama_pengguna' => $_POST['nama_pengguna'], 
    'kata_sandi'    => $_POST['kata_sandi'], 
    'id_pegawai'    => $id_pegawai,
    'status'        => $_POST['status']
);

$res1 = $crud->insert("tb_login",$data1);

if ($res && $res1) {
    header("location:../index.php?page=view_pegawai");
}

?>